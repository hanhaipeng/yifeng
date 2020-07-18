<?php
declare (strict_types = 1);

namespace app\admin\controller;

use think\facade\View;
use think\Request;
use app\admin\model\Classlist as ClasslistModel;

class Classlist
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        //读取数据
        $list = ClasslistModel::getList(1);
        //分配到模板
        View::assign('list',$list);
        return view();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create(Request $request)
    {
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
        $res = ClasslistModel::store($request->post());
        return json($res);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
