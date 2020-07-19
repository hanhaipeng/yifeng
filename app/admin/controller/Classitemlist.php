<?php
declare (strict_types = 1);

namespace app\admin\controller;

use app\admin\model\Classitemlist as ClassitemlistModel;
use think\facade\View;
use think\Request;

class Classitemlist
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($classid)
    {
        //读取数据
        $list = ClassitemlistModel::getList($classid);
        //分配到模板
        View::assign('list',$list);
        View::assign('classid',$classid);
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create($classid)
    {
        View::assign('classid',$classid);
        return view();
    }

    /**
     * 新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function add(Request $request)
    {
        $res = ClassitemlistModel::_add($request->post());
        return json($res);
    }
}
