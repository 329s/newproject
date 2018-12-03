<?php

namespace app\admin\model;

use think\Model;

class FestivalHoliday extends Model
{
    // 表名
    protected $name = 'festival_holiday';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'is_full_required_text',
        'status_text'
    ];
    

    
    public function getIsFullRequiredList()
    {
        return ['0' => __('Is_full_required 0'),'1' => __('Is_full_required 1')];
    }     

    public function getStatusList()
    {
        return ['0' => __('Status 0'),'1' => __('Status 1'),'2' => __('Status 2')];
    }     


    public function getIsFullRequiredTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['is_full_required'];
        $list = $this->getIsFullRequiredList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function admin()
    {
        return $this->belongsTo('Admin', 'admin_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
