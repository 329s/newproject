<?php
namespace app\common\components;
use think\Controller;
use app\admin\components\Consts;
use fast\Http;
/**
* @desc 用户信息共用方法
*/
class MemberModule extends Controller
{
	/**
	*@desc 证件号码验证*/
	public static function validateIdentity($identityType=1, $identityId) {
        switch ($identityType) {
        	case '1':
        		$arrResult = self::verifyUserIdentityCardNo($identityId);
        		break;
        	case '2':
        		$arrResult = self::verifyHKandMacaoPassNo($identityId);
        		break;
        	case '3':
        		$arrResult = self::verifyTaiwanPassNo($identityId);
        		break;
        	case '4':
        		$arrResult = self::verifyPassportNo($identityId);
        		break;
        	default:
        		$arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        		break;
        }
        return $arrResult;

    }

    /**
    *@desc    验证身份证1
    *@param   $identityCardNo 身份证号码
    *@return  $arrResult array
    */
    public static function verifyUserIdentityCardNo($identityCardNo) {
        $arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        do{
        	if (!preg_match('/^(^\d{18}$|^\d{17}(\d|X|x))$/', $identityCardNo)) {
        	    $arrResult['error'] = Consts::RESULT_ERROR;
        	    $arrResult['desc']  = __('Identity Card Num No Pass');
        	    break;
	        }
	        $url='http://apicloud.mob.com/idcard/query';
	        $param = ['key'=>'1408a2894205a','cardno'=>$identityCardNo];
	        $reponse = Http::sendRequest($url,$param,'get');
	        if($reponse['ret']){
	        	//有返回
	        	$reponseIdentity = json_decode($reponse['msg']);
	        	if($reponseIdentity->retCode == '200' && $reponseIdentity->msg == 'success'){
	        		$arrResult['result'] = $reponseIdentity->result;
	        		break;
	        	}else{
	        		$arrResult['error'] = Consts::RESULT_ERROR;
	        		$arrResult['desc']  = $reponse['msg']['msg'];
	        		break;
	        	}

	        }else{//错误没返回
	        	$arrResult['error'] = Consts::RESULT_ERROR;
	        	$arrResult['desc']  = $reponse['msg'];
	        	break;
	        }

        }while (0);
        return $arrResult;
    }

    /**
    *@desc    港澳通行证验证2
    *@param   $passportNo 港澳通行证号码 规则： H/M + 10位或6位数字
    *@example H1234567890
    *@return  $arrResult array
    */
    public static function verifyHKandMacaoPassNo($passportNo) {
        $arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        do{
        	if (!preg_match('/^([A-Z]\d{6,10}(\(\w{1}\))?)$/', $passportNo)) {
        	    $arrResult['error'] = Consts::RESULT_ERROR;
        	    $arrResult['desc']  = __('HK And Macao No Pass');
        	    break;
	        }
        }while(0);
        return $arrResult;
    }

    /**
    *@desc    台湾通行证验证3
    *@param   $passportNo 台湾通行证号码 规则： 旧版10位数字 + 英文字母
    *@example 样本： A234567890
    *@return  $arrResult array
    */
    public static function verifyTaiwanPassNo($passportNo) {
        $arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        do{
        	if (!preg_match('/^[a-zA-Z][0-9]{9}$/', $passportNo)) {
        	    $arrResult['error'] = Consts::RESULT_ERROR;
        	    $arrResult['desc']  = __('Tai Wan Num No Pass');
        	    break;
	        }
        }while(0);
        return $arrResult;
    }
    /**
    *@desc    护照验证4
    *@param   $passportNo 护照号码 规则： 14/15开头 + 7位数字, G + 8位数字, P + 7位数字, S/D + 7或8位数字,等
    *@example 样本： 141234567, G12345678, P1234567
    *@return  $arrResult array
    */
    public static function verifyPassportNo($passportNo) {
        $arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        do{
        	if (!preg_match('/^1[45][0-9]{7}$|([P|p|S|s]\d{7}$)|([S|s|G|g]\d{8}$)|([Gg|Tt|Ss|Ll|Qq|Dd|Aa|Ff]\d{8}$)|([H|h|M|m]\d{8,10})$/', $passportNo)) {
        	    $arrResult['error'] = Consts::RESULT_ERROR;
        	    $arrResult['desc']  = __('PassPort Num No Pass');
        	    break;
	        }
        }while(0);
        return $arrResult;
    }























}