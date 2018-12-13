<?php

namespace app\admin\controller\order;

use app\common\controller\Backend;
use app\admin\components\test;

/**
 * 订单管理
 *
 * @icon fa fa-circle-o
 */
class Order extends Backend
{
    
    /**
     * Order模型对象
     * @var \app\common\model\Order
     */
    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Order');
        $this->view->assign("soureList", $this->model->getSoureList());
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("usertypeList", $this->model->getUsertypeList());
        $this->view->assign("priceTypeList", $this->model->getPriceTypeList());
        $this->view->assign("paySourceList", $this->model->getPaySourceList());
        $this->view->assign("depositPaySourceList", $this->model->getDepositPaySourceList());
        $this->view->assign("settlementStatusList", $this->model->getSettlementStatusList());
        $this->view->assign("preferentialTypeList", $this->model->getPreferentialTypeList());
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
        // $test = new test();
        // $re = $test->tt();
        // echo "<pre>";
        // echo "</pre>";
        // die;

        //当前是否为关联查询
        $this->relationSearch = true;
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax())
        {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField'))
            {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                    ->with(['admin'])
                    ->where($where)
                    ->order($sort, $order)
                    ->count();

            $list = $this->model
                    ->with(['admin'])
                    ->where($where)
                    ->order($sort, $order)
                    ->limit($offset, $limit)
                    ->select();

            foreach ($list as $row) {
                
                
            }
            $list = collection($list)->toArray();
            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        return $this->view->fetch();
    }
}
