<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/6
 * Time: 13:46
 */
//在一个二维数组中，每一行从左到右都是递增，每一列都上到下都是递增。判断数组中是否有某函数,数组是长方形的
function search($target, $array) {
    $i = count($array[0]) - 1;
    $j = 0;
    $arrayLen = count($array);

    if ($target > $array[$arrayLen - 1][$i] || $target < $array[0][0]) {
        return false;
    }

    for ($j; $j < $arrayLen; $j++) {

        if ($target <= $array[$j][$i]) {//只要小于本行最

            for ($i; $i >= 0; $i--) {
                if ($target == $array[$j][$i]) {
                    return true;
                }
            }

            $i = count($array[0]) - 1;
        }
    }

    return false;

}

/*$array = array(
    array(3, 6, 7, 8),
    array(4, 17, 19, 25),
    array(5, 19, 22, 28),
    array(9, 21, 23, 29)
);

for ($i = 0; $i < 30; $i++) {
    $target = $i;
    if (search($target, $array)) {
        echo $i . '在数组里';
        echo "<br/>";
    }
}*/

function quickSort($arr, $left, $right) {
    $temp = $arr[$left];
    $i = $left;
    $j = $right;
    while ($i != $j) {
        while ($arr[$j] >= $temp && $i < $j) {
            $j--;
        }
    }
}

function replace($str) {
    $len = strlen($str);
    if ($len <= 0 ) {
        return false;
    }
    $blank = 0;
    for ($i = 0; $i < $len; $i++) {
        if ($str[$i] == ' ') {
            $blank++;
        }
    }
    if ($blank == 0) {
        return false;
    }
    $new_length = ($len + $blank * 2) - 1;
    echo $new_length;
    for ($i = $len-1; $i >=0; $i--) {
        if ($str[$i] == ' ') {
            $str[$new_length--] = '0';
            $str[$new_length--] = '2';
            $str[$new_length--] = '%';
        } else {
            $str[$new_length--] = $str[$i];
        }
    }
    return $str;
}
var_dump(replace('We Are Happy'));
