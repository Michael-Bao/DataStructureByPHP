<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/6
 * Time: 10:06
 */

$pattern = '/[0-9A-Za-z]+@[0-9A-Za-z]+\./';
$subject = '123@qq.com';

$return = preg_match($pattern, $subject, $matches);
print_r($return);
echo "<br/>";
print_r($matches);
exit;

$pattern = '/[0-9]/'; //正则
$subject = 'abc1def2ghi3klm4'; //需要匹配的字符串
$return = preg_match($pattern, $subject, $matches);
echo $return; //1 因为匹配到了1个就会停止匹配
echo '<br/>';
print_r($matches); // ['1'] 将所有满足正则规则的匹配放到数组里。
echo '<hr/>';


$pattern = '/[0-9]/'; //正则
$subject = 'abc1def2ghi3klm4'; //需要匹配的字符串
$return = preg_match_all($pattern, $subject, $matches);
echo $return; //4 因为会匹配到所有
echo '<br/>';
print_r($matches); // [0=>['1','2','3','4']] 注意是个二维数组。
echo '<hr/>';


$pattern = '/[0-9]/';
$replacement = "mao";
$subject = 'sdfd1dfd1232sdlfdss33';
$return = preg_replace($pattern, $replacement, $subject);
print_r($return);
echo '<hr/>';



$pattern = array('/[0-3]/', '/[4-6]/', '/[7-9]/');
$replacement = array('M', "A", "O");
$subject = array('sd', 'sd2', 'dfd', '34df');
$return = preg_filter($pattern, $replacement, $subject);
print_r($return);
echo '<hr/>';

$pattern = '/[0-9A-Za-z]+@[0-9A-Za-z]+\.com/';
$subject = '536465@qq.com';
$return = preg_match($pattern, $subject);
print_r($return);
echo "<br/>";
print_r($matches);
