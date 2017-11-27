<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/22
 * Time: 17:33
 */

/**
 * Class Linear
 * 线性表区分于链表的
 *   优势：可以通过下标迅速访问数组中任何元素
 *   劣势：增加或删除的效率并不高，例如往某个部位插入一个元素，例如去重。
 * 1.初始化 __construct()
 * 2.销毁   __destruct()
 * 3.清空   clearList()
 * 4.为空   isEmpty()
 * 5.长度   listLength()
 * 6.取元素        getElem(int $index)
 * 7.取元素的位置   getElemForPos($element) //第一次出现的位置
 * 8.前驱          priorElem($element)
 * 9.后继          nextElem($element)
 * 10.插入         insertElem(int $i, $element)
 * 11.根据下标删除  deleteElemForPos(int $i)
 * 12.(去重)根据元素的值删除元素 deleteElem(int $i, bool $once)
 * 13.遍历         traverseList()
 *
 * private :
 *   $list
 *   $length
 *
 */
class Linear
{
    private $list;
    private $length;

    //初始化线性表
    public function __construct()
    {
        $this->list = array();
        $this->length = 0;
    }


    //销毁线性表
    public function __destruct()
    {
        if (isset($this->list)) {
            unset($this->list);
            $this->length = 0;
        }
    }

    public function clearList()
    {
        //只需要把数组长度设置为 0 即可，不必对数组本身进行操作。
        //删、取操作之前会判断 length 的值，插入操作把其覆盖即可。
        $this->length = 0;
    }
    //判断线性表是否为空
    public function isEmpty()
    {
        if (0 == $this->length) {
            return true;
        }
        return false;
    }

    //取线性表的长度
    public function listLength()
    {
        return $this->length;
    }

    /*public function checkIndex(int $index, string $type='get')
    {
        $length = $this->length;
        $left = 0;
        switch ($type) {
            case "get" :
                $right = $length -1;
                break;
            case "prior" :
                $left  = 1;
                $right = $length - 1;
            default:
                break;
        }

        if ($index < $left || $index > $right) {
            exit('下标不在范围内');
        }

        return true;
    }*/
    //取元素
    public function getElem(int $index)
    {
        if ($this->checkIndex($index)) {
            return $this->list[$index];
        }
    }

    public function checkIndex(int $index)
    {
        if (0 > $index || $index >= $this->length) {
            exit('下标不在范围内');
        }
        return true;
    }

    //获得元素第一次出现的位置
    public function getElemForPos($element)
    {
        if ($this->isEmpty()) {
            return -1;
        }

        $list = $this->list;

        for ($i = 0, $l = $this->length; $i < $l; $i++) {//遍历表中的元素
            if ($list[$i] === $element) {//找到元素
                return $i;
            }
        }

        return -1;
    }

    //前驱
    public function priorElem($element)
    {
        $index = $this->getElemForPos($element);
        //若不存在该元素，或元素为第一个
        if ($index == -1 || $index == 0) {
            return false;
        }

        return $this->list[$index-1];
    }

    //后继
    public function nextElem($element)
    {
        $index = $this->getElemForPos($element);

        //不存在该元素，或元素为最后一个
        if ($index == -1 || $index == $this->length-1) {
            return false;
        }

        return $this->list[$index+1];
    }

    //遍历元素
    public function traverseList()
    {
        if ($this->isEmpty()) {
            return false;
        }

        $list = $this->list;

        for ($i = 0, $l = $this->length; $i < $l; $i++) {
            echo $list[$i];
        }
    }

    //插入元素
    public function insertElem($element, int $index=null)
    {
        if (0 > $index || $index > $this->length) {
            exit('下标不在范围内');
        }
        if ($index===null) $index = $this->length;

        $list = $this->list;

        for ($i = $this->length-1; $i >= $index; $i--) {//从尾部开始，到被插入的下标结束
            $list[$i+1] = $list[$i]; //将元素往后挪动以为
        }

        $list[$index] = $element; //插入元素
        $this->list = $list;
        $this->length++;

        return true;
    }

    //根据下标删除元素
    public function deleteElemForPos(int $index)
    {
        if (!$this->checkIndex($index) || $this->isEmpty()) {
            return false;
        }

        $list = $this->list;
        //length 自身先减 1，再赋值给 len
        $len = --$this->length;

        for ($i = $index; $i < $len; $i++) { //从被删除的坐标的下一位开始，每个元素往前挪动一位
            $list[$i] = $list[$i+1];
        }
        unset($list[$len]); //注销掉最后一位
        $this->list = $list;

        return true;
    }

    //根据元素的值删除元素
    public function deleteElem($elem, bool $once=false)
    {
        if ($this->isEmpty()) {
            return false;
        }

        $list = $this->list;
        if (!$once) { //若删除所有与目标元素相同的元素
            $this->deleteElemNoOnce($elem);
            return true;
        }

        for ($i = 0, $l = $this->length; $i < $l; $i++) { //遍历所有元素
            if ($list[$i] === $elem) { //遇到目标元素
                for ($j = $i; $j < $l-1; $j++) {
                    $list[$j] = $list[$j+1];
                }
                unset($list[$l-1]); //注销最后一个
                $i = $l;
            }
        }
        $this->list = $list;
        $this->length--;
        return true;

    }

    //遍历删除所有与目标元素相同的元素
    public function deleteElemNoOnce($elem)
    {
        $num  = 0;
        $list = $this->list;
        $len  = $this->length;

        for ($j = 0; $j < $len - $num; $j++) { //之前出现过 $num 次，填这个坑的就是往后排的第 $num 个，因此 $j < $len - $num
            if ($list[$j + $num] !== $elem) { //若往下数第 $num 个元素非目标元素，往前挪 $num 位
                $list[$j] = $list[$j + $num];
            } else {
                $num++;//跳出，判断下一个，并且往前挪的位数再加 1
                $j--; //下下个元素补的还是这个坑
            }
        }

        for ($x = $len-1; $x > $len-$num-1; $x--) { //从后开始删除，共删 $num 个
            unset($list[$x]);
        }

        $this->length = $len - $num;
        $this->list =  $list;

    }

}

$linkedlist = new Linear();
$linkedlist->insertElem(1);
$linkedlist->insertElem(4);
$linkedlist->insertElem(2);
$linkedlist->insertElem(8);
$linkedlist->insertElem(3);
$linkedlist->insertElem(4);
$linkedlist->insertElem(8);
$linkedlist->insertElem(4);
$linkedlist->insertElem(5);
$linkedlist->insertElem(4);
$linkedlist->insertElem(4);
$linkedlist->insertElem(3);
$linkedlist->insertElem(4);
$linkedlist->insertElem(9,1);
$linkedlist->traverseList();
echo "<hr/>";
//echo $linkedlist->priorElem(1);
//echo $linkedlist->nextElem(0);

//echo "<hr/>";
//echo $linkedlist->getElem(1);
//echo $linkedlist->getElemForPos(8);
//$linkedlist->initList();
var_dump($linkedlist->deleteElemForPos(1));
$linkedlist->traverseList();
echo "<hr/>";
$linkedlist->deleteElem(4,false);
$linkedlist->traverseList();

