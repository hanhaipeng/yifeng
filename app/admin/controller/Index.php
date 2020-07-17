<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\Route;
use think\facade\View;
use function mysql_xdevapi\getSession;

class Index
{
    public function index()
    {
        return view();
    }

    public function welcome(){
        return view();
    }
}
