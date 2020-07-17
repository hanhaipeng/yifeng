<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\Request;
use \app\admin\model\Manager as ManagerModel;

class Resetpwd
{
    //加载视图/修改密码请求
    public function resetpwd(Request $request){
        if ($request->isPost()){
            $res = ManagerModel::resetpwd($request->post());
            return json($res);
        }else{
            return view();
        }
    }
}