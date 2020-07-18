<?php
declare (strict_types = 1);

namespace app\admin\model;

use app\admin\validate\ClasslistValidate;
use think\exception\ValidateException;
use think\Model;

/**
 * @mixin \think\Model
 */
class Classlist extends Model
{
    //数据添加
    public static function store($data){
        //数据验证
        try {
            validate(ClasslistValidate::class)->check($data);
        }catch (ValidateException $e){
            return return_msg(2,$e->getMessage());
        }
        //数据入库
        $res = self::create([
            'name' => $data['name'],
            'sort' => $data['sort'],
        ]);

        //返回结果
        if ($res){
            return return_msg(1,'添加成功');
        }else{
            return return_msg(2,'添加失败');
        }
    }

    public static function getList($num=10){
        $list = self::paginate($num);
        return $list;
    }
}
