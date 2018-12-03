<?php

namespace app\admin\controller\vehicle;

use app\common\controller\Backend;
use fast\Tree;

/**
 * 
 *
 * @icon fa fa-circle-o
 */
class Brand extends Backend
{
    
    /**
     * VehicleBrand模型对象
     * @var \app\admin\model\VehicleBrand
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('VehicleBrand');
        $this->view->assign("statusList", $this->model->getStatusList());

        $tree = Tree::instance();
        $tree->init(collection($this->model->order('id desc')->select())->toArray(), 'vehicle_brand_id');

        $this->brandlist = $tree->getTreeList($tree->getTreeArray(0), 'name');
        $branddata = [0 => ['type' => 'all', 'name' => __('None')]];
        foreach ($this->brandlist as $k => $v)
        {
            $branddata[$v['id']] = $v;
        }

        
        $this->view->assign("parentList", $branddata);
    }
    
    /**
     * 默认生成的控制器所继承的父类中有index/add/edit/del/multi五个基础方法、destroy/restore/recyclebin三个回收站方法
     * 因此在当前控制器中可不用编写增删改查的代码,除非需要自己控制这部分逻辑
     * 需要将application/admin/library/traits/Backend.php中对应的方法复制到当前控制器,然后进行修改
     */
    

}
