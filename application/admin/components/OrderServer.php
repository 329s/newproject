<?php
namespace app\admin\components;
use think\Controller;

/**
* 订单后台下单等操作
*/
class OrderServer extends Controller
{

	/**
	*@desc  订单录入数据处理
	*@param $params array 订单提交post数据
	*/
	public static function orderAddBefore($params)
	{
		$arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];

		do{
			$requiredFields = ['customer_name','customer_telephone','customer_identity_type','customer_identity_id','soure','belong_office_id','rent_office_id','return_office_id','vehicle_model_id','vehicle_id','start_time','end_time'];
			foreach ($requiredFields as $key => $value) {
				if(!isset($params[$value])){
					$arrResult['error'] = Consts::RESULT_ERROR;
					$arrResult['desc'] = __('Parameter %s can not be empty',$value);
					break;
				}
			}
			if($arrResult['error'] == Consts::RESULT_ERROR){
				break;
			}

			// 判断账号是否创建
			$user_id = \app\admin\model\User::addMemberRegister($params['customer_telephone']);
			$arrResult['user_id']=$user_id;
			$member_id = \app\common\model\UserMember::addMember($params['customer_telephone'],$params['customer_name'],$params['customer_identity_type'],$params['customer_identity_id']);
			$arrResult['member_id']=$member_id;
			

		}while (0);
		return $arrResult;
	}
}
