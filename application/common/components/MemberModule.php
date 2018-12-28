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
        		$a=2;
        		# code...
        		break;
        	case '3':
        		$a=3;
        		# code...
        		break;
        	case '4':
        		$a=4;
        		# code...
        		break;
        	default:
        		$a=5;
        		# code...
        		break;
        }
        return $arrResult;

        /*if ($identityType == \common\components\Consts::ID_TYPE_IDENTITY) {
            return \common\components\UserModule::verifyUserIdentityCardNo($identityId);
        }
        elseif ($identityType == Consts::ID_TYPE_PASSPORT) {
            return \common\components\UserModule::verifyPassportNo($identityId);
        }
        elseif ($identityType == Consts::ID_TYPE_HK_MACAO) {
            return \common\components\UserModule::verifyHKandMacaoPassNo($identityId);
        }
        elseif ($identityType == Consts::ID_TYPE_TAIWAN) {
            return \common\components\UserModule::verifyTWandMacaoPassNo($identityId);
        }
        else {
            return array(-1, \Yii::t('locale', 'Identity card type invalid'));
        }
        return array(0, \Yii::t('locale', 'Success'));*/
    }

    public static function verifyUserIdentityCardNo($identityCardNo) {
        $arrResult = ['error' => Consts::RESULT_SUCCESS, 'desc' => __('Success')];
        do{
        	if (!preg_match('/^(^\d{18}$|^\d{17}(\d|X|x))$/', $identityCardNo)) {
        	    $arrResult['error'] = Consts::RESULT_ERROR;
        	    $arrResult['desc']  = '身份证号码错误';
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


        // if (isset(\Yii::$app->params['mob.identify.enabled']) && !\Yii::$app->params['mob.identify.enabled']) {
        //     return array(0, \Yii::t('locale', 'Success'));
        // }
        // $url = 'http://apicloud.mob.com/idcard/query';
        // $appKey = \Yii::$app->params['mob.identity.appkey'];

        // $params = array(
        //     'key' => $appKey,
        //     'cardno' => $identityCardNo,
        // );

        // $result = \common\helpers\Utils::queryUrlGet($url, $params);
        // if ($result[0] == 200) {
        //     $response = $result[1];
        //     $oResult = json_decode($response);
        //     if (isset($oResult->retCode) && $oResult->retCode == 200) {
        //         return array(0, \Yii::t('locale', 'Success'));
        //     }
        //     else if (isset($oResult->msg)) {
        //         \Yii::warning("verify user identity card no:{$identityCardNo} failed with http error:{$oResult->retCode} errmsg:{$oResult->msg}.", 'user');
        //         return array(1, $oResult->msg);
        //     }
        //     // test
        //     else {
        //         \Yii::error("verify user identity card no:{$identityCardNo} failed with unknown response:[{$response}]", 'user');
        //         return array(-1, '验证身份证信息无法解析响应内容。');
        //     }
        // }
        // else {
        //     \Yii::error("verify user identity card no:{$identityCardNo} failed with http error:{$result[0]} errmsg:{$result[1]}.", 'user');
        //     return array(1, $result[1]);
        // }

        // return array(-1, \Yii::t('locale', 'Unknown error'));
    }























}