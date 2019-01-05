<?php
namespace app\admin\components;
use think\Controller;
use app\admin\components\Consts;

/**
* 订单后台下单等操作
*/
class OrderServer extends Controller
{

	/**
	*@desc  检查账号创建和客户是否实名制
	*@param $params array 订单提交post数据
	*/
	public static function checkMemberBeforeOrderAdd($params)
	{
		$arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
		do{
			$requiredFields = ['customer_name','customer_telephone','customer_identity_type','customer_identity_id','source','rent_office_id','return_office_id','vehicle_model_id','vehicle_id','start_time','end_time'];
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
			$arrResult['result']['user_id']=$user_id;
			// 检查客户信息保存
			$memberResult = \app\common\model\UserMember::addMember($params['customer_telephone'],$params['customer_name'],$params['customer_identity_type'],$params['customer_identity_id'],$user_id);
			if($memberResult['error'] == Consts::RESULT_ERROR){
				$arrResult['error'] = $memberResult['error'];
				$arrResult['desc']  = $memberResult['desc'];
				break;
			}
			$arrResult['result']['member_id'] = $memberResult['member_id'];
		}while (0);
		return $arrResult;
	}

	/**
	*@desc 下单前数据
	*@
	**/
	public static function returnAllParams($params='')
	{
		$arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
		do{
			//检查账号、客户实名认证
			$res = self::checkMemberBeforeOrderAdd($params);
			if($res['error'] == Consts::RESULT_ERROR){
				$arrResult['error'] = $res['error'];
				$arrResult['desc']  = $res['desc'];
				break;
			}else{
				$params['user_member_id'] = $res['result']['member_id'];
			}
			//数据处理
			//1、时间处理
			$params['start_time'] = strtotime($params['start_time']);
			$params['end_time']   = strtotime($params['end_time']);
			// $timeRes = \app\common\components\CheckModule::timediff($params['start_time'],$params['end_time']);
			// $arrResult['timediff'] = $timeRes;

			//预定订单参数
			$params['serial'] = \app\common\model\Order::setSerialNo($params['usertype'],$params['source']);
			$params['status'] = Consts::ORDER_STATUS_BOOKING;//预定订单
			//出车订单参数
			//必须公共参数
			$params['new_end_time'] = $params['end_time'];
			$params['rent_days'] = $params['end_time'];
			$params['belong_office_id'] = $params['end_time'];
			$params['dispatched_time'] = $params['end_time'];//出车时间
			$params['appointment_time'] = $params['end_time'];//预约时间
			$params['appointment_end_time'] = $params['end_time'];//预约结束时间
			$params['admin_id'] = $params['end_time'];//最后一次编辑车
			$params['vehicle_outbound_mileage'] = $params['end_time'];//出库里程
			$params['total_amount'] = 0;//订单总金额
			$params['rent_per_day'] = 0;//每日租金
			$params['price_rent'] = 0;//车辆租金
			$params['price_poundage'] = 0;//手续费
			$params['price_basic_insurance'] = 0;//基本服务费
			$params['price_deposit_violation'] = 0;//违章押金
			$params['optional_service'] = 0;//已选增值服务
			$params['optional_service_info'] = 0;//增值服务明细(id:price;id:price...)
			$params['price_optional_service'] = 0;//增值服务总费用
			$params['daily_rent_detailed_info'] = 0;//每日租金明细
			$params['price_different_office'] = 0;//异店还车费用
			$params['price_take_car'] = 0;//送车上门费
			$params['price_return_car'] = 0;//上门取车费用
			$params['address_take_car'] = 0;//送车上门地址
			$params['address_return_car'] = 0;//上门取车地址


			$arrResult['result']=$params;
		}while(0);
		return $arrResult;
	}





}
