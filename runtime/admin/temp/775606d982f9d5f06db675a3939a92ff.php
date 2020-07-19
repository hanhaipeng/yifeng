<?php /*a:1:{s:83:"/Users/hanhaipeng/Documents/WebSite/yifeng/app/admin/view/classitemlist/create.html";i:1595147602;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">

<head>
    <meta charset="UTF-8">
    <title>创建类型配置</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="/static/admin/css/font.css">
    <link rel="stylesheet" href="/static/admin/css/xadmin.css">
    <script type="text/javascript" src="/static/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/static/admin/js/xadmin.js"></script>
    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form">
            <input type="hidden" name="classid" value="<?php echo htmlentities($classid); ?>">
            <div class="layui-form-item">
                <label for="name" class="layui-form-label">
                    <span class="x-red">*</span>名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" name="name" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="value" class="layui-form-label">
                    <span class="x-red">*</span>值
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="value" name="value" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="sort" class="layui-form-label">
                    <span class="x-red">*</span>排序
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="sort" name="sort" required="" lay-verify="required"
                           autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="formtype" class="layui-form-label">
                    <span class="x-red">*</span>表单类型
                </label>
                <div class="layui-input-inline">
                    <input id="formtype" type="radio" name="formtype" value="1" title="单行文本" checked>
                    <input type="radio" name="formtype" value="2" title="多行文本">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="add" class="layui-form-label">
                </label>
                <button id="add" class="layui-btn" lay-filter="add" lay-submit="">
                    增加
                </button>
            </div>
        </form>
    </div>
</div>
<script>layui.use(['form', 'layer'],
    function() {
        $ = layui.jquery;
        var form = layui.form,
            layer = layui.layer;

        //监听提交
        form.on('submit(add)',
            function(data) {
                $.post('<?php echo url("classitemlist.add"); ?>',data.field,function (res) {
                    console.log(res);
                    //发异步，把数据提交给php
                    layer.alert(res.msg, {
                            icon: 6
                        },
                        function(index) {
                            if (res.code==1){
                                // 可以对父窗口进行刷新
                                xadmin.father_reload();
                            }

                            xadmin.close(index);
                        });
                });
                return false;
            });

    });
</script>
</body>

</html>
