<?php

namespace app\common\model;

use think\Model;
use app\admin\model\User;
use Hashids\Hashids;
use app\admin\components\Consts;

class UserMember extends Model
{
    // 表名
    protected $name = 'user_member';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = 'updatetime';
    
    // 追加属性
    protected $append = [
        'gender_text',
        'identity_type_text',
        'user_type_text',
        'driver_license_type_text',
        'driver_license_time_text',
        'driver_license_expire_time_text',
        'max_renting_cars_text',
        'isblack_text',
        'accident_text',
        'unfreeze_time_text'
    ];
    

    
    public function getGenderList()
    {
        return ['0' => __('Gender 0'),'1' => __('Gender 1'),'2' => __('Gender 2')];
    }     

    public function getIdentityTypeList()
    {
        return ['1' => __('Identity_type 1'),'2' => __('Identity_type 2'),'3' => __('Identity_type 3'),'4' => __('Identity_type 4')];
    }     

    public function getUserTypeList()
    {
        return ['1' => __('User_type 1'),'2' => __('User_type 2')];
    }     

    public function getDriverLicenseTypeList()
    {
        return ['1' => __('Driver_license_type 1'),'2' => __('Driver_license_type 2'),'3' => __('Driver_license_type 3'),'4' => __('Driver_license_type 4'),'5' => __('Driver_license_type 5'),'6' => __('Driver_license_type 6')];
    }     

    public function getMaxRentingCarsList()
    {
        return ['4) unsigne' => __('4) unsigne')];
    }     

    public function getIsblackList()
    {
        return ['0' => __('Isblack 0'),'1' => __('Isblack 1')];
    }     

    public function getAccidentList()
    {
        return ['2) unsigne' => __('2) unsigne')];
    }     


    public function getGenderTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['gender'];
        $list = $this->getGenderList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIdentityTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['identity_type'];
        $list = $this->getIdentityTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getUserTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['user_type'];
        $list = $this->getUserTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getDriverLicenseTypeTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['driver_license_type'];
        $list = $this->getDriverLicenseTypeList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getDriverLicenseTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['driver_license_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getDriverLicenseExpireTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['driver_license_expire_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }


    public function getMaxRentingCarsTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['max_renting_cars'];
        $list = $this->getMaxRentingCarsList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getIsblackTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['isblack'];
        $list = $this->getIsblackList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getAccidentTextAttr($value, $data)
    {        
        $value = $value ? $value : $data['accident'];
        $list = $this->getAccidentList();
        return isset($list[$value]) ? $list[$value] : '';
    }


    public function getUnfreezeTimeTextAttr($value, $data)
    {
        $value = $value ? $value : $data['unfreeze_time'];
        return is_numeric($value) ? date("Y-m-d H:i:s", $value) : $value;
    }

    protected function setDriverLicenseTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setDriverLicenseExpireTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }

    protected function setUnfreezeTimeAttr($value)
    {
        return $value && !is_numeric($value) ? strtotime($value) : $value;
    }


    public function user()
    {
        return $this->belongsTo('User', 'user_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function admin()
    {
        return $this->belongsTo('Admin', 'admin_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }


    public function office()
    {
        return $this->belongsTo('Office', 'office_id', 'id', [], 'LEFT')->setEagerlyType(0);
    }

    /**
    * 生成客户邀请码
    * @param  int      $user_id    账号id
    * @return string   $code       邀请码
    */
    function createCode($user_id) {
        static $source_string = 'E5FCDG3HQA4B1NOPIJ2RSTUV67MWX89KLYZ';
        $num = $user_id;
        $code = '';
        while ( $num > 0) {
            $mod = $num % 35;
            $num = ($num - $mod) / 35;
            $code = $source_string[$mod].$code;
        }
        if(empty($code[3]))
            $code = str_pad($code,4,'0',STR_PAD_LEFT);
        return $code;
    }
    /**
    *编辑客户信息保存前处理
    */
    public function beforeMemberUpdate($params){
        // 会员生日处理
        // 先判断是否有生日，没有则生成
        if (empty($params['birthday']) && $params['identity_type'] == '1' && $params['identity_id']) {
            $params['birthday'] = substr($params['identity_id'], 6,4).'-'.substr($params['identity_id'], 10,2).'-'.substr($params['identity_id'], 12,2);
        }
        // 判断是否关联账号
        if(empty($params['user_id'])){
            $user_id = \app\admin\model\User::addMemberRegister($params['telephone']);
            $params['user_id']  = $user_id;

        }
        if(empty($params['invite_code']) && !empty($params['user_id'])){
            // 自动生成邀请码
            $hashids = new Hashids(config('site.HashidsKey'),config('site.invite_code_length'));
            $params['invite_code'] = $hashids->encode($params['user_id']);
        }

        return $params;
    }

    /**
    *生成订单前
    *@param $mobile
    *@param $name
    *@param $identity_type
    *@param $identity_id
    */
    public static function addMember($mobile='',$name='',$identity_type='1',$identity_id='',$user_id='0')
    {
        $arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        do{
            if (!empty($identity_id)) {
                $result = self::where('identity_id', $identity_id)->find();
                if(!$result){
                    $identityResult = \app\common\components\MemberModule::validateIdentity($identity_type,$identity_id);
                    if($identityResult['error'] == Consts::RESULT_ERROR){//  判断证件是否合法
                        $arrResult['error'] = Consts::RESULT_ERROR;
                        $arrResult['desc']  = $identityResult['desc'];
                        break;
                    }
                    // 添加客户
                    $time = time();
                    $data = array(
                        'telephone'     => $mobile,
                        'name'          => $name,
                        'source'        => Consts::MEMBER_SOURCE_TYPE_BACK_AUTO,
                        'identity_type' => $identity_type,
                        'identity_id'   => $identity_id,
                        'admin_id'      => $_SESSION['think']['admin']['id'],
                        'updatetime'    => $time,
                        'createtime'    => $time,
                    );
                    if($identity_type=='1'){
                        $birthday                  = substr($identity_id, 6,4).'-'.substr($identity_id, 10,2).'-'.substr($identity_id, 12,2);
                        $data['birthday']          = $birthday;
                        $data['residence_address'] = $identityResult['result']->area;
                        if($identityResult['result']->sex == '男'){
                            $data['gender']        = 1;
                        }elseif ($identityResult['result']->sex == '女') {
                            $data['gender']        = 2;
                        }
                    }
                    //判断账号是否创建
                    if($user_id){
                        $data['user_id']           = $user_id;
                        //邀请码
                        $hashids                   = new Hashids(config('site.HashidsKey'),config('site.invite_code_length'));
                        $data['invite_code']       = $hashids->encode($user_id);
                    }

                    $UserMemberModel = Model('UserMember');
                    $rasult          = $UserMemberModel->allowField(true)->save($data);
                    $arrResult['member_id']  = $UserMemberModel->id;
                }else{
                    $arrResult['member_id']  = $result['id'];
                }
            }
        }while(0);
        return $arrResult;

    }
}
