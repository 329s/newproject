<?php
namespace app\admin\components;
use think\Controller;

/**
* 订单后台下单等操作
*/
class OrderServer extends Controller
{

	/*function __construct(argument)
	{
		# code...
	}*/

	/**
	*@desc  订单录入数据处理
	*@param $params array 订单提交post数据
	*/
	public static function orderAddBefore($params)
	{
		return $params;
	}
}
