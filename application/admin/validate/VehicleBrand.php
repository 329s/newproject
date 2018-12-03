<?php

namespace app\admin\validate;

use think\Validate;

class VehicleBrand extends Validate
{
    /**
     * 验证规则
     */
    protected $rule = [
        'name' => 'require|unique:name',
    ];
    /**
     * 提示消息
     */
    protected $message = [
    ];
    /**
     * 验证场景
     */
    protected $scene = [
        'add'  => ['name'],
        'edit' => ['name'],
    ];

    public function __construct(array $rules = [], $message = [], $field = [])
    {
        $this->field = [
            'name' => __('name'),
        ];
        parent::__construct($rules, $message, $field);
    }
}
