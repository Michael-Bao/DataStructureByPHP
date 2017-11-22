<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/22
 * Time: 16:04
 */
include 'dataStructureStack.php';

class Code
{
    private static $typeToNum;
    private static $numArray;
    private $typeNum;

    public function __construct(string $type)
    {
        self::$typeToNum = array(
            'binary' => 2,
            'octonary' => 8,
            'hexadecimal' => 16
        );
        self::$numArray = [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F'];

        $this->typeNum = self::$typeToNum[$type];
    }

    public function getNumOfAnotherType(int $num)
    {
        $numArray = self::$numArray;
        $typeNum = $this->typeNum;
        $stack = new Stack(30);

        while ($num != 0) {
            $in = $numArray[$num % $typeNum];
            $stack->push($in);
            $num = floor($num / $typeNum);
        }

        $stack->stackTraverse(false);
    }
}

$type = 'hexadecimal';
$code = new Code($type);

$num = 1358;
$numOfAnotherType = $code->getNumOfAnotherType($num);

