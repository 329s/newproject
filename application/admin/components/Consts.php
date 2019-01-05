<?php
namespace app\admin\components;
/**
* 设置常量
*/
class Consts
{
	/*接口等返回结果*/
	const RESULT_ERROR  	  = 1;
	const RESULT_SUCCESS 	  = 0;

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
	//客户来源source
	const MEMBER_SOURCE_TYPE_BACK_ADD   = 1;  //后台添加
	const MEMBER_SOURCE_TYPE_BACK_AUTO  = 2;  //后台下单自动生成
	const MEMBER_SOURCE_TYPE_MOBILE_ADD = 3;  //移动端信息完善
	const MEMBER_SOURCE_TYPE_OTHER      = 4;  //其他
	// 订单来源:1=门店订单,2=手机订单,3=网站订单,4=小程序订单,5=IOS,6=安卓,7=携程订单,8=悟空订单,9=同行订单
	const ORDER_SOURCE_OFFICE           = 1; //门店订单
	const ORDER_SOURCE_MOBILE           = 2; //手机订单
	const ORDER_SOURCE_PC               = 3; //网站订单
	const ORDER_SOURCE_MINI_PROGRAM     = 4; //小程序订单
	const ORDER_SOURCE_IOS              = 5; //IOS
	const ORDER_SOURCE_ANDROID          = 6; //安卓
	const ORDER_SOURCE_XIECHEN          = 7; //携程
	const ORDER_SOURCE_WUKONG           = 8; //悟空
	const ORDER_SOURCE_COLLEAGUE        = 9; //同行订单











}