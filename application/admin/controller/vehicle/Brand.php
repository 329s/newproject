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
    //搜索默认字段
    protected $searchFields = 'name';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('VehicleBrand');
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("typeList", $this->model->getTypeList());

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
    /**
     * 查看
     */
    public function index()
    {
        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->with(['vehiclebrand'])
                ->where($where)
                ->order($sort, $order)
                ->count();

            $list = $this->model
                ->with(['vehiclebrand'])
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }


    /**
    *搜索功能,品牌选择
    */
    public function getAllBrand(){
        $Vehicle_brand_id = $this->request->get('Vehicle_brand_id');
        $status    = $this->request->get('status');

        if(!$Vehicle_brand_id){
            $Vehicle_brand_id = 0;
        }

        if(!$status){
            $list = $this->model->getBrand($Vehicle_brand_id);
        }else{
            $list = $this->model->getBrand($Vehicle_brand_id,$status);
        }


        $array = array();
        foreach ($list as $key => $value) {
            $array[$value['id']] = $value['name'];
        }

        return $array;
    }

}
