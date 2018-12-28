<?php

namespace app\admin\controller\order;

use app\common\controller\Backend;
use app\admin\components\test;
use app\admin\components\OrderServer;

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
        $this->view->assign("CustomerIdentityTypeList", $this->model->getCustomerIdentityTypeList());
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
        //return $this->view->fetch();

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

    /**
     * 添加
     */
    public function add()
    {

        $params = array(
            'customer_name' => '文伯龙',
            'customer_telephone' => '15267314456',
            'customer_identity_type' => '1',//证件类型:1=身份证,2=港澳通行证,3=护照
            'customer_identity_id' => '622426199411255213',
            'soure' => '1',//订单来源:1=门店订单,2=手机订单,3=网站订单,4=小程序订单,5=IOS,6=安卓,7=携程订单,8=悟空订单,9=同行订单
            'belong_office_id' => '2',
            'rent_office_id' => '2',
            'return_office_id' => '2',
            'vehicle_model_id' => '2',
            'vehicle_id' => '1',
            'start_time' => time(),
            'end_time' => time()+86400*2,
            'optional_service' => '',//增值服务
            'remark_content' => '',

        );
        echo "<pre>";
        $p = \app\admin\components\OrderServer::orderAddBefore($params);
        print_r($p);
        echo "</pre>";die;
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                if ($this->dataLimit && $this->dataLimitFieldAutoFill) {
                    $params[$this->dataLimitField] = $this->auth->id;
                }
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = basename(str_replace('\\', '/', get_class($this->model)));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.add' : true) : $this->modelValidate;
                        $this->model->validate($validate);
                    }

                    // 添加订单时操作
                    $res    = \app\admin\components\OrderServer::orderAddBefore($params);
                    
                    $result = $this->model->allowField(true)->save($params);
                    if ($result !== false) {
                        $this->success();
                    } else {
                        $this->error($this->model->getError());
                    }
                } catch (\think\exception\PDOException $e) {
                    $this->error($e->getMessage());
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        return $this->view->fetch();
    }

    /**
     * 编辑
     */
    public function edit($ids = NULL)
    {
        $row = $this->model->get($ids);
        if (!$row)
            $this->error(__('No Results were found'));
        $adminIds = $this->getDataLimitAdminIds();
        if (is_array($adminIds)) {
            if (!in_array($row[$this->dataLimitField], $adminIds)) {
                $this->error(__('You have no permission'));
            }
        }
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            if ($params) {
                try {
                    //是否采用模型验证
                    if ($this->modelValidate) {
                        $name = basename(str_replace('\\', '/', get_class($this->model)));
                        $validate = is_bool($this->modelValidate) ? ($this->modelSceneValidate ? $name . '.edit' : true) : $this->modelValidate;
                        $row->validate($validate);
                    }
                    $result = $row->allowField(true)->save($params);
                    if ($result !== false) {
                        $this->success();
                    } else {
                        $this->error($row->getError());
                    }
                } catch (\think\exception\PDOException $e) {
                    $this->error($e->getMessage());
                }
            }
            $this->error(__('Parameter %s can not be empty', ''));
        }
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }
}
