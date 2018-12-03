<?php

namespace app\admin\model;

use think\Model;

class VehicleFeePlan extends Model
{
    // 表名
    protected $name = 'vehicle_fee_plan';

    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    // 追加属性
    protected $append = [
        'status_text',
    ];




    public function getStatusList()
    {
        return ['0' => __('Status 0'),'1' => __('Status 1')];
    }


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function vehiclemodel()
    {
        return $this->belongsTo('VehicleModel', 'vehicle_model_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function office()
    {
        return $this->belongsTo('Office', 'office_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function admin()
    {
        return $this->belongsTo('Admin', 'admin_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }



    /*数据处理*/

    /**
    *节假日价格处理
    *对数组先序列化----->再压缩------>在加密
    */
    public function festivalPrice($params=array()){
        $field = array(
            'price_festival_1',
            'price_festival_2',
            'price_festival_3',
            'price_festival_4',
            'price_festival_5',
            'price_festival_6',
            'price_festival_7',
            'price_festival_8',
            'price_festival_9',
            'price_festival_10');
        foreach ($field as $key => $value) {
            if(isset($params[$value])){
                $arr[$value] = $params[$value];
            }
        }
        return base64_encode(gzcompress(serialize($arr)));
    }

    /**
    *节假日价格反序列化
    *对字符串先解密----->在解压缩----->再反序列化
    *目的：防止序列化数组后反序列化报错
    */
    public function common_unserialize($serial_str) {
        return unserialize(gzuncompress(base64_decode($serial_str)));
    }

    /**
    *判断是否已经添加过价格
    *如果已经有则先删除后添加
    *否则直接添加
    */
    public function isAdd($params)
    {
        $result = true;

        if($params['status'] == '1'){
            $time   = time();
            $where['vehicle_model_id'] = array('eq',$params['vehicle_model_id']);
            $where['office_id']        = array('eq',$params['office_id']);
            $where['status']           = array('eq',$params['status']);
            $result = $this->where($where)->select();
            //先判断是否存在
            if(!empty($result)){
                $result = $this->where($where)->update(['status'=>'0','updatetime'=>$time]);
            }
        }
        return $result;
        //存在则修改后添加
        // 不存在则添加
    }
}
