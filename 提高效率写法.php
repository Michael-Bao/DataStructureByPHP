<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/10
 * Time: 10:31
 */
/**
 * 1.多重循环，小循环在外 //测试外 100 内 100000 以及颠倒过来的情况，都在内循环中定义一个数组并销毁它，性能都是 8s
 *
 * 2.销毁变量释放内存，尤其是大数组
 *
 * 3.若需要获取时间，$_SERVER['REQUEST_TIME'] 优于 time();
 *
 * 4.内部字符串函数优于正则表达式 str_replace strtr
 *   strtr( "baab", "ab", "01" ); //ba01
 *   $trans = array( "ab" => "01" );
 *   echo strtr( "baab", $trans );
 *   还有 strpbrk() strncasecmp() strpos()
 *
 * 5.单引号包含字符串
 *
 * 6.使用 ip2long() 和 long2ip() 函数把IP地址转成整型 存放进数据库
 *   降低1/4的存储空间。对地址进行排序和快速查找速度上升;
 *
 * 7.可以尝试使用 isset($foo[14]) 代替 strlen($foo)>14；isset 是语言结构，而 strlen 是函数。
 *
 * 8.global 变量，用完 unset()掉；
 *
 *
 */

