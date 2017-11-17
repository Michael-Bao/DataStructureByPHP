<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/17
 * Time: 17:25
 */
class Queue
{
    /*
     * public
     *   __construct($length)
     *   __destruct()
     *   clearQueue(&$arr)
     *   queueEmpty($arr)
     *   queueFull($arr)
     *   queueLength($arr)
     *   enQueue(&$arr, $element)
     *   deQueue(&$arr)
     *   queueTraverse()
     *
     * private
     *   $queue
     *   $now
     *   $queueLen
     *   $queueCapacity
     *   $head
     *   $tail
     */
    private $queue;
    private $queueLen;
    private $queueCapacity;
    private $head;
    private $tail;

    //构建一个队列，设置队列长度，队头、队尾的位置，队列容量
    public function __construct($length = 0)
    {
        $this->queue = array();
        $this->queueCapacity = $length;
        $this->clearQueue();
    }

    public function __destruct()
    {
        unset($this->queue);
    }

    //清空队列
    public function clearQueue()
    {
        $this->head = 0;
        $this->tail = 0;
        $this->queueLen = 0;
    }

    //判断是否为空
    public function queueEmpty()
    {
        return $this->queueLen == 0 ? true : false;
    }

    //判断是否已满
    public function queueFull()
    {
        return $this->queueLen == $this->queueCapacity ? true : false;
    }

    //获取长度
    public function queueLength()
    {
        return $this->queueLen;
    }

    //新增元素
    public function enQueue($element)
    {
        if ($this->queueFull()) { //队列未满才能增
            return false;
        }
        $this->queue[$this->tail] = $element; //新增数放尾巴
        $this->tail++;
        $this->tail %= $this->queueCapacity; //例如容量为 4，上一个数在第 3 的位置，再新增，队尾应指向 0 ，而非指向 4。
        $this->queueLen++;
    }

    //移除元素
    public function deQueue()
    {
        if ($this->queueEmpty()) { //队列非空才能减
            return false;
        }
        $res = $this->queue[$this->head]; //先进先出
        $this->queue[$this->head] = null;

        $this->head++;
        $this->head %= $this->queueCapacity;
        $this->queueLen--;

        return $res;
    }

    //遍历元素
    public function queueTraverse()
    {
        $l = $this->queueLen;
        $head = $this->head;
        $queue = $this->queue;
        $queueCap = $this->queueCapacity;

        for ($i = 0; $i < $l; $i++) {
            echo $queue[($head + $i) % $queueCap] . "<br>" . "<br>";
        }
    }
}


//操作
$queue = new Queue(5);

$queue->enQueue(10);
$queue->enQueue(16);
$queue->deQueue();
$queue->enQueue(19);
$queue->queueTraverse();

$queue->clearQueue();
$queue->enQueue(23);
$queue->enQueue(30);

$queue->queueTraverse();

//成员的数据类型还可以 数组、对象..
$arr = array('mao', 'na');
$queue->enQueue($arr);
$queue->queueTraverse();

class Student
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age  = $age;
    }
}
$queue->enQueue($stu);
$queue->queueTraverse();

$queue->__destruct();
