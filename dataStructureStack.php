<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/20
 * Time: 8:37
 */
Class Stack
{
    /**
     * public
     *   __construct()
     *   __destruct()
     *   stackEmpty()    //是否空
     *   stackFull()     //是否满
     *   stackLength()   //长度
     *   clearStack()    //清空
     *   push()          //插入
     *   pop()           //剔除
     *   stackTraverse() //遍历
     *
     * private
     *   $stack      //栈
     *   $stackSize  //容量
     *   $stackTop   //长度
     */

    private $stack;
    private $size;
    private $top;

    public function __construct($size)
    {
        $this->size = $size;
        $this->top  = 0;
        $this->stack     = array();
    }

    public function __destruct()
    {
       unset($this->stack);
    }

    public function stackEmpty()
    {
        return $this->top==0 ? true : false;
    }

    public function stackFull()
    {
        return $this->top==$this->size ? true : false;
    }

    public function stackLength()
    {
        return $this->top;
    }

    public function clearStack()
    {
        $this->stack = array();
        $this->top = 0;
    }

    public function push($element)
    {
        if ($this->stackFull()) {
            return false;
        }
        $this->stack[$this->top] = $element;
        $this->top++;
    }

    public function pop()
    {
        if ($this->stackEmpty()) {
            return false;
        }
        $this->stack[$this->top-1] = null;
        $this->top--;
    }

    public function stackTraverse()
    {
        $stack = $this->stack;
        $top = $this->top;
        print_r($stack);
        for ($i = 0; $i < $top; $i++) {
            //echo $stack[$i].'<br/>';
        }
    }
}

$stack = new Stack(6);

$stack->push(1);
$stack->push(2);
$stack->pop();
$stack->push(3);
$stack->clearStack();
$stack->push(4);
$stack->pop();
$stack->push(5);
$stack->push(6);
$stack->pop();
$stack->push(7);
$stack->push(8);

$stack->stackTraverse();