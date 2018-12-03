<?php 
namespace app\common\model;

use think\Model;
/**
* 
*/
class Cityarea extends Model
{
	/**
	* @desc   根据城市code值查省市区
	* @param  $code 3307028
	* @return 浙江省/金华市/婺城区
	*/
	public static function getCityByCode($code='')
	{
		$address = '';
		$cityareaModel = new Cityarea;
		$district = $cityareaModel->where('code',$code)
							      ->find();
		$address = $district ? $district->address : $address;
		if(!empty($district->parentId)){
			$city = $cityareaModel->where('code',$district->parentId)
							      ->find();
			$address = $city->address.'/'.$address;
			if($city->parentId){
				$province = $cityareaModel->where('code',$city->parentId)
							       ->find();
				$address = $province->address.'/'.$address;
			}
		}
		return $address;
	}
}