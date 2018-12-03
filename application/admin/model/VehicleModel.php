<?php

namespace app\admin\model;

use think\Model;

class VehicleModel extends Model
{
    // 表名
    protected $name = 'vehicle_model';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'vehicle_type_text',
        'vehicle_flag_text',
        'carriage_text',
        'seat_text',
        'gearbox_text',
        'oil_label_text',
        'air_intake_mode_text',
        'status_text',
    ];
    

    protected static function init()
    {
        self::afterInsert(function ($row) {
            $pk = $row->getPk();
            $row->getQuery()->where($pk, $row[$pk])->update(['weight' => $row[$pk]]);
        });
    }

    public function getStatusList()
    {
        return ['0' => __('Status 0'),'1' => __('Status 1'),'2' => __('Status 2')];
    }
    public function getVehicleTypeList()
    {
        return ['1' => __('Vehicle_type 1'),'2' => __('Vehicle_type 2'),'3' => __('Vehicle_type 3'),'4' => __('Vehicle_type 4'),'5' => __('Vehicle_type 5')];
    }     

    public function getVehicleFlagList()
    {
        return ['1' => __('Vehicle_flag 1'),'2' => __('Vehicle_flag 2'),'4' => __('Vehicle_flag 4'),'8' => __('Vehicle_flag 8'),'16' => __('Vehicle_flag 16'),'32' => __('Vehicle_flag 32'),'64' => __('Vehicle_flag 64')];
    }     

    public function getCarriageList()
    {
        return ['1' => __('Carriage 1'),'2' => __('Carriage 2'),'3' => __('Carriage 3')];
    }     

    public function getSeatList()
    {
        return ['1' => __('Seat 1'),'2' => __('Seat 2'),'3' => __('Seat 3'),'4' => __('Seat 4'),'5' => __('Seat 5'),'6' => __('Seat 6')];
    }     

    public function getGearboxList()
    {
        return ['1' => __('Gearbox 1'),'2' => __('Gearbox 2')];
    }     

    public function getOilLabelList()
    {
        return ['1' => __('Oil_label 1'),'2' => __('Oil_label 2'),'3' => __('Oil_label 3'),'4' => __('Oil_label 4'),'5' => __('Oil_label 5')];
    }     

    public function getAirIntakeModeList()
    {
        return ['1' => __('Air_intake_mode 1'),'2' => __('Air_intake_mode 2')];
    }     



    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }
    public function getVehicleTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['vehicle_type'];
        $list = $this->getVehicleTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getVehicleFlagTextAttr($value, $data)
    {
        $value = $value ? $value : $data['vehicle_flag'];
        $valueArr = explode(',', $value);
        $list = $this->getVehicleFlagList();
        return implode(',', array_intersect_key($list, array_flip($valueArr)));
    }


    public function getCarriageTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['carriage'];
        $list = $this->getCarriageList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSeatTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['seat'];
        $list = $this->getSeatList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getGearboxTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['gearbox'];
        $list = $this->getGearboxList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getOilLabelTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['oil_label'];
        $list = $this->getOilLabelList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getAirIntakeModeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['air_intake_mode'];
        $list = $this->getAirIntakeModeList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    protected function setVehicleFlagAttr($value)
    {
        return is_array($value) ? implode(',', $value) : $value;
    }


    public function vehiclebrand()
    {
        return $this->belongsTo('VehicleBrand', 'vehicle_brand_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    public function vehicleseries()
    {
        return $this->belongsTo('VehicleBrand', 'model_series_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
    public function admin()
    {
        return $this->belongsTo('Admin', 'admin_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
