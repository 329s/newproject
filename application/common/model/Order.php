<?php

namespace app\common\model;

use think\Model;

class Order extends Model
{
    // 表名
    protected $name = 'order';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'soure_text',
        'status_text',
        'usertype_text',
        'start_time_text',
        'end_time_text',
        'new_end_time_text',
        'price_type_text',
        'confirmed_time_text',
        'returned_time_text',
        'dispatched_time_text',
        'settlemented_time_text',
        'appointment_time_text',
        'appointment_end_time_text',
        'pay_source_text',
        'deposit_pay_source_text',
        'settlement_status_text',
        'preferential_type_text',
        'price_overtime_text'
    ];
    

    
    public function getSoureList()
    {
        return ['1' => __('Soure 1'),'2' => __('Soure 2'),'3' => __('Soure 3'),'4' => __('Soure 4'),'5' => __('Soure 5'),'6' => __('Soure 6'),'7' => __('Soure 7'),'8' => __('Soure 8'),'9' => __('Soure 9')];
    }

    public function getStatusList()
    {
        return ['0' => __('Status 0'),'1' => __('Status 1'),'2' => __('Status 2'),'3' => __('Status 3'),'4' => __('Status 4'),'5' => __('Status 5'),'400' => __('Status 400')];
    }

    public function getUsertypeList()
    {
        return ['1' => __('Usertype 1'),'2' => __('Usertype 2')];
    }

    public function getPriceTypeList()
    {
        return ['1' => __('Price_type 1'),'2' => __('Price_type 2'),'3' => __('Price_type 3'),'4' => __('Price_type 4')];
    }     

    public function getPaySourceList()
    {
        return ['0' => __('Pay_source 0'),'1' => __('Pay_source 1'),'2' => __('Pay_source 2'),'3' => __('Pay_source 3'),'4' => __('Pay_source 4'),'5' => __('Pay_source 5'),'6' => __('Pay_source 6'),'7' => __('Pay_source 7'),'8' => __('Pay_source 8')];
    }     

    public function getDepositPaySourceList()
    {
        return ['0' => __('Deposit_pay_source 0'),'1' => __('Deposit_pay_source 1'),'2' => __('Deposit_pay_source 2'),'3' => __('Deposit_pay_source 3'),'4' => __('Deposit_pay_source 4'),'5' => __('Deposit_pay_source 5'),'6' => __('Deposit_pay_source 6'),'7' => __('Deposit_pay_source 7'),'8' => __('Deposit_pay_source 8')];
    }     

    public function getSettlementStatusList()
    {
        return ['0' => __('Settlement_status 0'),'1' => __('Settlement_status 1'),'2' => __('Settlement_status 2'),'3' => __('Settlement_status 3'),'4' => __('Settlement_status 4')];
    }     

    public function getPreferentialTypeList()
    {
        return ['4) unsigne' => __('4) unsigne')];
    }     


    public function getSoureTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['soure'];
        $list = $this->getSoureList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getUsertypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['usertype'];
        $list = $this->getUsertypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getStartTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['start_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getEndTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['end_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getNewEndTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['new_end_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getPriceTypeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['price_type'];
        $list = $this->getPriceTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getConfirmedTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['confirmed_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    public function getDispatchedTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['dispatched_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getReturnedTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['returned_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getSettlementedTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['settlemented_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getAppointmentTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['appointment_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getAppointmentEndTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['appointment_end_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getPaySourceTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['pay_source'];
        $list = $this->getPaySourceList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getDepositPaySourceTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['deposit_pay_source'];
        $list = $this->getDepositPaySourceList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getSettlementStatusTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['settlement_status'];
        $list = $this->getSettlementStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPreferentialTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['preferential_type'];
        $list = $this->getPreferentialTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getPriceOvertimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['price_overtime'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setStartTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setEndTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setNewEndTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setConfirmedTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setDispatchedTimeAttr($value)
    {//
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setReturnedTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setSettlementedTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setAppointmentTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setAppointmentEndTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setPriceOvertimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


    public function admin()
    {
        return $this->belongsTo('Admin', 'edit_admin_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }
}
