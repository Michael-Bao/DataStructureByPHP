<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/22
 * Time: 16:28
 */
include 'dataStructureStack.php';

/**
 * Class CheckStatement
 * 输入一个语句，判断语句中的括号使用是否正确
 * 1.若右括号的出现不合时宜，会在遍历结束之前弹出错误
 * 2.若只出现左括号而不出现右括号，会通过检查栈长度的函数弹出错误
 */

class CheckStatement
{
    private $left;
    private $right;
    private $rightOfLeft;
    private $stack;

    /**
     * CheckStatement constructor.
     * 定义左边的括号，右边的括号，及括号之间的对应关系
     */
    public function __construct()
    {
        $this->rightOfLeft = array(
            '(' => ')',
            '[' => ']',
            '{' => '}',
        );
        $this->left  = '([{';
        $this->right = ')]}';

        $this->stack = new Stack(50);
    }

    public function putStrToStack(string $str)
    {
        $left = $this->left;
        $right = $this->right;
        $rightOfLeft = $this->rightOfLeft;

        $stack = $this->stack;

        for ($i = 0, $l = strlen($str); $i < $l; $i++) {
            //如果是左边的括号，则将其对应的右括号放入栈
            if (false !== strpos($left, $str[$i])) {
                $this->stack->push($rightOfLeft[$str[$i]]);
            }

            //如果是右边的括号，判断是否为栈顶，否则提示错误
            if (false !== strpos($right, $str[$i])) {
                $pop = $stack->pop();
                if ($pop != $str[$i]) {
                    exit('need ' . "<strong>$pop</strong>" . ' but ' . "<strong>$str[$i]</strong>");
                }
            }
        }
    }

    public function checkStack()
    {//若栈不为空，说明为需要的右括号没有出现.
        if ($this->stack->stackLength()) {
            return "need <strong>". $this->stack->pop() ."</strong> but no";
        }
        return 'well done!';
    }
}


$str = '[({';

$checkObject = new CheckStatement();
$checkObject->putStrToStack($str);
echo $checkObject->checkStack();

