<?php
namespace app\common\components;
use think\Controller;
use app\admin\components\Consts;
/**
*
*/
class CheckModule extends Controller
{

	/**
	*@desc 计算两个时间戳之差的日时分秒
	*@param $start_time 时间戳
	*@param $end_time   时间戳
	*/
    public static function timediff($start_time,$end_time)
    {
        //计算天数
        $timediff = $end_time-$start_time;
        $days = intval($timediff/86400);
        //计算小时数
        $remain = $timediff%86400;
        $hours = intval($remain/3600);
        //计算分钟数
        $remain = $remain%3600;
        $mins = intval($remain/60);
        //计算秒数
        $secs = $remain%60;
        $res = array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
        return $res;
    }
















}