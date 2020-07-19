<?php
declare (strict_types = 1);

namespace app\admin\model;

use app\admin\validate\ClassitemlistValidate;
use think\exception\ValidateException;
use think\Model;

/**
 * @mixin \think\Model
 */
class Classitemlist extends Model
{
    //获取列表数据
    public static function getList($classid){
        $list = self::where('id','=',$classid)->select();
        return $list;
    }

    //数据添加
    public static function _add($data){
        $res = self::_checkData($data);
        if ($res !== true){
            return $res;
        }

        //数据入库
        $res = self::create([
            'classid' => $data['classid'],
            'name' => $data['name'],
            'sort' => $data['sort'],
            'value' => $data['value'],
            'formtype' => $data['formtype']
        ]);

        //返回结果
        if ($res){
            return return_msg(1,'添加成功');
        }else{
            return return_msg(2,'添加失败');
        }
    }

    public static function _update($data,$id){
        if (!is_numeric($id) || !is_integer(intval($id)) || intval($id) <= 0){
            return return_msg('2','参数id='.$id.'不正确');
        }

        $data['id'] = $id;

        $res = self::_checkData($data);
        if ($res !== true){
            return $res;
        }

        $res = self::update([
            'classid' => $data['classid'],
            'name' => $data['name'],
            'sort' => $data['sort'],
            'value' => $data['value'],
            'formtype' => $data['formtype']
        ],['id' => $id]);

        //返回结果
        if ($res !== false){
            return return_msg(1,'修改成功');
        }else{
            return return_msg(2,'修改失败');
        }
    }

    public static function  _delete($id){
        if (!is_numeric($id) || !is_integer(intval($id)) || intval($id) <= 0){
            return return_msg('2','参数id='.$id.'不正确');
        }

        if (self::destroy($id)){
            return return_msg('1','删除成功');
        }
        return return_msg('2','删除失败');
    }

    private static function _checkData($data){
        //数据验证
        try {
            validate(ClassitemlistValidate::class)->check($data);
        }catch (ValidateException $e){
            return return_msg(2,$e->getMessage());
        }

        return true;
    }
}
