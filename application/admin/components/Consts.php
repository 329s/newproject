<?php
namespace app\admin\components;
/**
* 设置常量
*/
class Consts
{
	/*接口等返回结果*/
	const RESULT_ERROR  	  = '1';
	const RESULT_SUCCESS 	  = '0';
	// const RESULT_SUCCESS_DESC = '成功';
	// const RESULT_ERROR_DESC   = '失败';

	/*订单状态*/
	const ORDER_STATUS_DEl              = '0';	//删除订单
	const ORDER_STATUS_BEFORE_CONFIRMED = '1';	//待确认订单/未排车
	const ORDER_STATUS_BOOKING          = '2';	//预定订单/已排车
	const ORDER_STATUS_RENTING 			= '3';	//已出车/在租订单订单
	const ORDER_STATUS_RETURNED_CAR 	= '4';	//已还车/违章待查订单
	const ORDER_STATUS_COMPLETE 		= '5';	//完成订单
	const ORDER_STATUS_CANCEL 			= '400';//取消订单

	/*证件类型*/
	const MEMBER_TYPE_IDENTITY          = 1;  //身份证
	const MEMBER_TYPE_HK_MACAO          = 2;  //港澳通行证
	const MEMBER_TYPE_TAIWAN            = 3;  //台湾台胞证
	const MEMBER_TYPE_PASSPORT          = 4;  //护照











}