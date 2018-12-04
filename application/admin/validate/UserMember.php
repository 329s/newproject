<?php

namespace app\admin\validate;

use think\Validate;

class UserMember extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'identity_id' => 'require|max:18',
        'telephone'   => 'require',
    ];
    /**
     * 提示消息
     */
    protected $message = [
        'identity_id.max' => '证件号码不正确'
    ];
    /**
     * 字段描述
     */
    protected $field = [
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => ['identity_id','telephone'],
        'edit' => ['identity_id','telephone'],
    ];

    public function __construct(array $rules = [], $message = [], $field = [])
    {
        $this->field = [
            'identity_id' => __('Identity_id'),
            'telephone' => __('Telephone'),
        ];
        parent::__construct($rules, $message, $field);
    }
}
