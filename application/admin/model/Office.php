<?php

namespace app\admin\model;

use think\Model;
// use app\common\model\Cityarea;

class Office extends Model
{
    // 表名
    protected $name = 'office';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';

    // 追加属性
    protected $append = [
        //'open_time_text',
        //'close_time_text',
        'status_text',
        'isactivity_text',
        // 'cityidname'
    ];



    public function getStatusList()
    {
        return ['0' => __('Status 0'),'1' => __('Status 1'),'2' => __('Status 2')];
    }

    public function getIsactivityList()
    {
        return ['0' => __('Isactivity 0'),'1' => __('Isactivity 1')];
    }


   /* public function getOpenTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['open_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getCloseTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['close_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }*/


    public function getStatusTextAttr($value, $data)
    {
        $value = $value ? $value : $data['status'];
        $list = $this->getStatusList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsactivityTextAttr($value, $data)
    {
        $value = $value ? $value : $data['isactivity'];
        $list = $this->getIsactivityList();
        return isset($list[$value]) ? $list[$value] : '';
    }

    /*protected function setOpenTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setCloseTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }*/
    // 上级门店
    public function getParentOffice($parentid = NULL, $status = NULL)
    {
        $list = collection(self::where(function($query) use($parentid, $status) {
                    if (!is_null($parentid))
                    {
                        $query->where('parentid', '=', $parentid);
                    }
                    if (!is_null($status))
                    {
                        $query->where('status', '=', $status);
                    }
                })->order('id', 'asc')->select())->toArray();
        $array = array(array('id'=>'0','fullname'=>'无'));
        $list = array_merge($array,$list);
        return $list;
    }

    // 后台编辑者
    public function admin()
    {
        return $this->belongsTo('Admin', 'edit_userid')->setEagerlyType(0);
    }
    // 所属测试
    public function cityarea()
    {
        return $this->belongsTo('app\common\model\Cityarea', 'cityid')->setEagerlyType(0);
    }
    // 
    public function officeParentName()
    {
        return $this->belongsTo('Office', 'parentid')->setEagerlyType(0);
    }


}
