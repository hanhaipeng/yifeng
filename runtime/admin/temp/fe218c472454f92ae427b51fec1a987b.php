<?php /*a:1:{s:82:"/Users/hanhaipeng/Documents/WebSite/yifeng/app/admin/view/classitemlist/index.html";i:1595147094;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>参数类型</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <link rel="stylesheet" href="/static/admin/css/font.css">
        <link rel="stylesheet" href="/static/admin/css/xadmin.css">
        <script src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
        <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">参数配置</a>
            <a>
              <cite>参数配置</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <button class="layui-btn" onclick="xadmin.open('添加配置','/admin/classitemlist/create/<?php echo htmlentities($classid); ?>',450,350)"><i class="layui-icon"></i>添加配置</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <th width="60">ID</th>
                                  <th>名称</th>
                                  <th width="80">排序</th>
                                  <th width="130">操作</th>
                              </thead>
                              <tbody>
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo htmlentities($vo['id']); ?></td>
                                    <td><?php echo htmlentities($vo['name']); ?></td>
                                    <td><?php echo htmlentities($vo['sort']); ?></td>
                                    <td class="td-manage">
                                        <a title="编辑" class="layui-btn layui-btn-sm layui-btn-normal" onclick="xadmin.open('编辑','/admin/classlist/edit/<?php echo htmlentities($vo['id']); ?>',450,250)" href="javascript:;">
                                            <i class="layui-icon">&#xe642;</i>编辑
                                        </a>
                                        <a title="删除" class="layui-btn layui-btn-sm layui-btn-danger" onclick="member_del(this,'<?php echo htmlentities($vo['id']); ?>')" href="javascript:;">
                                            <i class="layui-icon">&#xe640;</i>删除
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
<!--                                <div>-->
<!--                                  <a class="prev" href="">&lt;&lt;</a>-->
<!--                                  <a class="num" href="">1</a>-->
<!--                                  <span class="current">2</span>-->
<!--                                  <a class="num" href="">3</a>-->
<!--                                  <a class="num" href="">489</a>-->
<!--                                  <a class="next" href="">&gt;&gt;</a>-->
<!--                                </div>-->
                                <?php echo $list; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              $.post('/admin/classlist/delete/'+id,{},function (res) {
                  layer.msg(res.msg,{icon:1,time:1000},function () {
                      if (res.code == 1){
                          //发异步删除数据
                          $(obj).parents("tr").remove();
                      }
                  });
              });
          });
      }
    </script>
</html>