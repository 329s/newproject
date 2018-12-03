<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use app\common\model\Cityarea;

/**
 * 门店管理
 *
 * @icon fa fa-circle-o
 */
class Office extends Backend
{
    
    /**
     * Office模型对象
     * @var \app\admin\model\Office
     */
    protected $model = null;
    protected $relationSearch = true;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Office');
        $this->view->assign("statusList", $this->model->getStatusList());
        $this->view->assign("isactivityList", $this->model->getIsactivityList());
        $this->view->assign("parentList", $this->model->getParentOffice(1,0));//1代表数据库id为1的父级总部，若改为0，则不显示
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
        //设置过滤方法
        $this->request->filter(['strip_tags']);
        if ($this->request->isAjax()) {
            //如果发送的来源是Selectpage，则转发到Selectpage
            if ($this->request->request('keyField')) {
                return $this->selectpage();
            }
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->with(['admin','cityarea','officeParentName'])
                ->where($where)
                ->order($sort, $order)
                ->count();

            $list = $this->model
                ->with(['admin','cityarea','officeParentName'])
                ->where($where)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $list = collection($list)->toArray();
            /*foreach ($list as $key => $value) {
                $address = Cityarea::getCityByCode($value['cityid']);
                $list[$key]['cityid'] = $address;
                $list[$key]['areaid'] = Cityarea::getCityByCode($value['areaid']);
            }*/
        // echo "<pre>";
        // print_r($list);
        // echo "</pre>";die;
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
        if ($this->request->isPost()) {
            $params = $this->request->post("row/a");
            // 添加当前操作的账号
            $params['edit_userid'] = $this->auth->id;
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

            // 添加当前操作的账号
            $params['edit_userid'] = $this->auth->id;
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

        // 所属城市省市区显示字段
        $address = Cityarea::getCityByCode($row->cityid);
        $row->cityidname=$address;
        //所属区域
        $areaidname = Cityarea::getCityByCode($row->areaid);
        $row->areaidname=$areaidname;
        // 上级门店
        // $p

        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    // 搜索功能，上级门店动态搜索
    public function parentidselect($value='')
    {
        $list = $this->model->getParentOffice();
        $arr = array();
        foreach ($list as $key => $value) {
            if($value['id'] != '0'){
                $arr[$value['id']] = $value['fullname'];
            }
        }
        return ($arr);
    }






}
