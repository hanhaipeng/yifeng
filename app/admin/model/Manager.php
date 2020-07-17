<?php
declare (strict_types = 1);

namespace app\admin\model;

use app\admin\validate\ManagerValidate;
use think\exception\ValidateException;
use think\facade\Session;
use think\Model;

/**
 * @mixin \think\Model
 */
class Manager extends Model
{
    //修改密码
    public static function resetpwd($data){
        //数据基础验证
        try {
            validate(ManagerValidate::class)->scene('resetpwd')->check($data);
        }catch (ValidateException $e){
            return return_msg(2,$e->getMessage());
        }

        //判断数据库是否有该账户
        $manager = self::find(Session::get('adminId'));

        if (!$manager){
            return return_msg(1,'账号登录密码异常');
        }

        //判断旧密码是否正确
        if (password_verify($data['oldpass'],$manager['password']) !== true){
            return return_msg(2,'密码输入不正确');
        }

        //更新新密码
        $manager['password'] = password_hash($data['newpass'],PASSWORD_DEFAULT);
        $result = $manager->save();

        //判断旧密码是否正确
        if ($result){
            return return_msg(1,'密码修改成功');
        }else{
            return return_msg(2,'密码输入不正确');
        }
    }


    public static function login($data){
        //1.验证器
        try {
            validate(ManagerValidate::class)->scene('login')->check($data);
        }catch (ValidateException $e){
            return return_msg(2,$e->getMessage());
        }
        //2.验证用户名和密码
        $user = self::where('username',$data['username'])->find();
        if ($user == null){
            return return_msg(2,'用户名不存在');
        }

        if (password_verify($data['password'],$user['password']) === false){
            return return_msg(2,'用户密码不正确');
        }

        Session::set('adminUser',$user['username']);
        Session::set('adminId',$user['id']);

        return return_msg(1,'登录成功');
    }
}
