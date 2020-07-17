<?php
declare (strict_types = 1);

namespace app\admin\validate;

use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 定义验证规则
     * 格式：'字段名'	=>	['规则1','规则2'...]
     *
     * @var array
     */	
	protected $rule = [];
    
    /**
     * 定义错误信息
     * 格式：'字段名.规则名'	=>	'错误信息'
     *
     * @var array
     */	
    protected $message = [];

    public function runCheck(){
        $request = Request::instance();
        if (self::check($request->param()) == false){
            return $this->getError();
        }

        return true;
    }
}
