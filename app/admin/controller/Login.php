<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Manager as ManagerModel;
use think\facade\Session;
use think\facade\View;
use think\Request;

class Login
{
    /**
     * 登录
     * @return \think\Response
     */
    public function login(Request $request)
    {
        if ($request->isPost() === true){
            $res = ManagerModel::login($request->post());
            return json($res);
        }else {
            return view();
        }
    }

    /**
     * 退出
     */
    public function logout(){
        Session::clear();
        return redirect('/admin/login');
    }
}
