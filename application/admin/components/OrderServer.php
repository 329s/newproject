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

			// 创建账号,添加客户
			/*$arrResult['a'] = \app\common\components\Common::getHashids(1);*/

		}while (0);
		return $arrResult;
	}
}
