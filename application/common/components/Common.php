<?php
namespace app\common\components;
use think\Controller;
use Hashids\Hashids;
/**
* 
*/
class Common extends Controller
{
	/*function __construct(argument)
	{
		# code...
	}*/

	/**
	*@desc 自动生成邀请码
	*@param $param
	*@return $code  string
	*/
	public static function getHashids($param){
        $hashids = new Hashids(config('site.HashidsKey'),config('site.invite_code_length'));
        $code = $hashids->encode($param);
        return $code;
	}

	/**
	*@desc客户证件号码验证
	*@param $identity_type
	*@param $identity_id
	*/
	public static function FunctionName($value='')
	{
		# code...
	}
}