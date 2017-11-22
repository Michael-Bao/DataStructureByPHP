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

    public function __construct(int $size)
    {
        $this->size = $size;
        $this->top  = 0;
        $this->stack = array();
    }

    public function __destruct()
    {
       unset($this ->stack);
    }

    public function stackEmpty() : bool
    {
        if (0 == $this->top) {
            return true;
        }
        return false;
    }

    public function stackFull() : bool
    {
        if ($this->top == $this->size) {
            return true;
        }
        return false;
        //return $this->top==$this->size ? true : false;
    }

    public function stackLength() : int
    {
        return $this->top;
    }

    public function clearStack() : bool
    {
        $this->stack = array();
        $this->top = 0;

        return true;
    }

    public function push($element) : bool
    {
        if ($this->stackFull()) {
            return false;
        }
        $this->stack[$this->top] = $element; //将新的元素放到栈顶
        $this->top++;

        return true;
    }

    //移除栈顶元素，并返回操作结果
    public function checkPop() : bool
    {
        if ($this->stackEmpty()) {
            return false;
        }
        $this->top--;
        $this->stack[$this->top] = null; //将栈顶的元素设置为 null

        return false;
    }
    //移除栈顶元素并返回
    public function pop() : string
    {
        if ($this->stackEmpty()) {
            return false;
        }
        $this->top--;

        $res = $this->stack[$this->top];
        $this->stack[$this->top] = null; //将栈顶的元素设置为 null

        return $res;
    }

    public function stackTraverse(bool $isFromButtom)
    {
        $stack = $this->stack;
        $top = $this->top;

        $res = '';
        if ($isFromButtom) {
            for ($i = 0; $i < $top; $i++) { //从底部开始输出
                echo ($stack[$i]).'<br/>';
            }
        } else {
            for ($i = $top - 1; $i >= 0; $i--) { //从栈顶开始输出
                echo $stack[$i].'<br/>';
            }
        }
    }

    public function getStack()
    {
        return $this->stack;
    }
}

