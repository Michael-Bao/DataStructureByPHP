<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/3
 * Time: 10:04
 * 对字符串大小写转换（非内置函数）
 * 方法：将字符串拆分成数组，根据要求，统一转成大写或小写
 * 具体操作：拆分：str_split 达到逐一拆分的效果，而不是 explode，大小写转换 chr(ord($value) ± ord('A') -+ ord('a')),最终在 join 或 implode 将数组合并成文件。
 * 注意：foreach 每个数组的值的时候，=> &$value，注意是传引用。
 */

$str = 'sdfkjkjjKJKJKJLLkljlkjlk';

function toUpOrlow($str='', $type='UP') {
    if (empty($str)) {
        return false;
    }

    $str = str_split($str);

    if (strtolower($type) == 'up') {
        $str = toUp($str);
    } else {
        $str = toLow($str);
    }

    $str = join($str);
    return $str;

}

function toUp($str) {
    foreach ($str as $key => &$value) {
        if ( $value>='a' && $value <= 'z') {
            $value = chr(ord($value) + ord('A') - ord('a'));
        }
    }

    return $str;

}

function toLow($str) {
    foreach ($str as $key => &$value) {
        if ( $value >= 'A' && $value <= 'Z') {
            $value = chr(ord($value) + ord('a') - ord('A'));
        }
    }

    return $str;
}

$str = toUpOrlow($str,'low');
echo $str;