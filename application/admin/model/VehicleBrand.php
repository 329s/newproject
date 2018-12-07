<?php

namespace app\admin\model;

use think\Model;

class VehicleBrand extends Model
{
    // 表名
    protected $name = 'vehicle_brand';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    // 追加属性
    protected $append = [
        'status_text',
        'type_text'
    ];



    public function getStatusList()
    {
        return ['0' => __('Status 0'),'1' => __('Status 1'),'2' => __('Status 2')];
    }

    public function getTypeList()
    {
        return ['0' => __('Type 0'),'1' => __('Type 1')];
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    public function getTypeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['type'];
        $list = $this->getTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function vehiclebrand()
    {
        return $this->belongsTo('VehicleBrand', 'vehicle_brand_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    /**
    *搜索功能品牌选择，不包含车系
    *@param status   门店状态 0=正常营业,1=临时关闭,2=永久关闭
    *@param vehicle_brand_id 所属品牌 0 即所有的品牌,其余都为车系
    */
    public function getBrand($vehicle_brand_id = '0',$status = NULL){
        $list = collection(self::where(function($query) use($vehicle_brand_id,$status){
                if (!is_null($vehicle_brand_id))
                {
                    $query->where('vehicle_brand_id', '=', $vehicle_brand_id);
                }
                if(!is_null($status))
                {
                    $query->where('status','=',$status);
                }
            })->order('id','asc')->select())->toArray();
        return $list;
    }


}
