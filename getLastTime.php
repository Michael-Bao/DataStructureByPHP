<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/3
 * Time: 17:17
 * 目的：判断一个时间离此刻有多久，根据时长显示几秒前 或 几分钟前 或 几个小时前 或 几天前 或 具体的时间 ，具体时间超过 1 年的，显示年份
 * 方法：设置时区，获取目标时间，得出距离此刻的 秒、分、时、天 数，向下取整。
 * 具体操作：当天数大于 3 时，显示 m-d H:i
 */
class ShowTime
{
    public $mixTimeOfToday;

    public function __construct()
    {
        $this->mixTimeOfToday = strtotime(date('Y-m-d 23:59:59'));
    }

    public function getMinutes($time)
    {
        //strtolower(date('Y-m-d 23:59:59' ))
        $minute = ceil( (strtotime(date('Y-m-d H:i:0')) - $time) / 60 );

        return $minute;
    }

    public function getHours($time)
    {
        $hour = floor( (strtotime(date('Y-m-d H:i:s')) - $time) / 3600 );

        return $hour;
    }

    public function getDays($time)
    {
        $day = floor( (strtotime(date('Y-m-d H:i:s')) - $time) / (3600*24));

        return $day;
    }
//几个小时前

//几天前
}
ini_set('date.timezone', 'Asia/Shanghai');

$targetTime = strtotime(date('Y-11-4 12:47:20'));

$show = new ShowTime();

$agoSeconds  = time() - $targetTime;
$agoMinutes = floor( $agoSeconds / 60);
$agoHours   = floor( $agoSeconds / 3600);
$agoDays    = floor( $agoSeconds / 86400 );

if ($agoDays > 3) {
    $format = date('Y') != date('Y', $targetTime) ? "Y-m-d H:i" : "m-d H:i";
    $showTime = date($format, $targetTime);
} elseif ($agoDays > 0) {
    $showTime = $agoDays . ' 天前';
} elseif ($agoHours > 0) {
    $showTime = $agoHours . ' 小时前';
} elseif ($agoMinutes > 0) {
    $showTime = $agoMinutes . ' 分钟前';
} else {
    $showTime = $agoSeconds . ' 秒前';
}

echo $showTime;
