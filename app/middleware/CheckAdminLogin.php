<?php
declare (strict_types = 1);

namespace app\middleware;

use think\facade\Session;

class CheckAdminLogin
{
    /**
     * 处理请求
     *
     * @param \think\Request $request
     * @param \Closure       $next
     * @return Response
     */
    public function handle($request, \Closure $next)
    {
        //登录验证
        if (!Session::has('adminUser') || !Session::has('adminId')){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
