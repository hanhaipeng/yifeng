<?php
declare (strict_types = 1);

namespace app\admin\validate;

class ManagerValidate extends BaseValidate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */
	protected $rule = [
	    'oldpass' => 'require|min:6',
        'newpass' => 'require|min:6|confirm:repass',
        'repass' =>  'require|min:6',
        'username' => 'require',
        'password' => 'require|min:6',
        'code|验证码' => 'require|captcha'
    ];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */
    protected $message = [
        'oldpass.require' => '旧密码不能为空',
        'oldpass.min' => '旧密码最少6位',
        'newpass.require' => '新密码不能为空',
        'newpass.min' => '新密码最少6位',
        'newpass.confirm' => '两次密码不一致',
        'username.require' => '用户名不能为空',
        'password.require' => '密码不能为空',
        'password.min' => '密码最少6位',
    ];

    protected $scene = [
        'resetpwd' => ['oldpass','newpass','repass'],
        'login' => ['username','password','code']
    ];
}
