<?php

namespace app\admin\model;

use think\Model;

class Vehicle extends Model
{
    // 表名
    protected $name = 'vehicle';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'status_text',
        'color_text',
        'vehicle_property_text',
        'isactivity_text',
        'annual_inspection_time_text',
        'tci_renewal_time_text',
        'vci_renewal_time_text',
        'insurance_text',
        'next_upkeep_time_text',
        'baught_time_text'
    ];
    

    
    public function getStatusList()
    {
        return ['0' => __('Status  0'),'1' => __('Status 1'),'2' => __('Status 2'),'3' => __('Status 3'),'4' => __('Status 4')];
    }     

    public function getColorList()
    {
        return ['0' => __('Color 0'),'1' => __('Color 1'),'2' => __('Color 2'),'3' => __('Color 3'),'4' => __('Color 4'),'5' => __('Color 5'),'6' => __('Color 6'),'7' => __('Color 7'),'8' => __('Color 8'),'9' => __('Color 9'),'10' => __('Color 10'),'11' => __('Color 11'),'12' => __('Color 12'),'13' => __('Color 13')];
    }     

    public function getVehiclePropertyList()
    {
        return ['1' => __('Vehicle_property 1'),'2' => __('Vehicle_property 2'),'3' => __('Vehicle_property 3'),'4' => __('Vehicle_property 4')];
    }     

    public function getIsactivityList()
    {
        return ['0' => __('Isactivity 0'),'1' => __('Isactivity 1')];
    }     

    public function getInsuranceList()
    {
        return ['1' => __('Insurance 1'),'2' => __('Insurance 2')];
    }     


    public function getStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getColorTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['color'];
        $list = $this->getColorList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getVehiclePropertyTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['vehicle_property'];
        $list = $this->getVehiclePropertyList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsactivityTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['isactivity'];
        $list = $this->getIsactivityList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getAnnualInspectionTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['annual_inspection_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getTciRenewalTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['tci_renewal_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getVciRenewalTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['vci_renewal_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getInsuranceTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['insurance'];
        $list = $this->getInsuranceList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getNextUpkeepTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['next_upkeep_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getBaughtTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['baught_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setAnnualInspectionTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setTciRenewalTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setVciRenewalTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setNextUpkeepTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setBaughtTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


    public function vehiclemodel()
    {
        return $this->belongsTo('VehicleModel', 'vehicle_model_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function belongoffice()
    {
        return $this->belongsTo('Office', 'belong_office_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function stopoffice()
    {
        return $this->belongsTo('Office', 'stop_office_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    public function admin()
    {
        return $this->belongsTo('admin','admin_id','id',[],'LEFT')->setEagerlyType(0);
    }
}
