<?php

namespace app\admin\controller\order;

use app\common\controller\Backend;
use app\admin\components\test;
use app\admin\components\OrderServer;
use app\admin\components\Consts;

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
    protected $dataLimit = 'auth';

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Order');
        $this->view->assign("sourceList", $this->model->getSourceList());
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

            $params = Array(
                            "customer_name" => '施俊健',
                            "customer_telephone" => 18395947721,
                            "customer_identity_type" => 1,
                            "customer_identity_id" => '330781198903294812',
                            "start_time" => '2019-01-04 09:56:42',
                            "end_time" => '2019-01-06 09:56:42',
                            "rent_days" => 2,
                            "source" => 1,
                            "rent_office_id" => 3,
                            "return_office_id" => 3,
                            "vehicle_model_id" => 2,
                            "vehicle_id" => 2,
                            "usertype" => 1,
                            "price_type" => 1,
                            "preferential_type" => 0,
                            "price_preferential" => 0,
                            "is_select_optional_service" => 1,
                            "total_amount" => 0,
                            "remark_content" => '哈哈'
                        );
        echo "<pre>";
        $res    = \app\admin\components\OrderServer::returnAllParams($params);
        print_r($res);
        echo "</pre>";die;
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            // echo "<pre>";

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

                    // 添加订单前对客户的操作操作
                    $res    = \app\admin\components\OrderServer::returnAllParams($params);
                    // if($res['error'] == Consts::RESULT_ERROR){
                    //     $this->error($res['desc']);
                    // }else{
                    //     $params['user_member_id'] = $res['result']['member_id'];
                    // }

                    // $params = \app\common\model\Order::OrderParamsAdd($params);
                    print_r($res);
                    die;
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
