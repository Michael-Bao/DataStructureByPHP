<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/27
 * Time: 16:54
 */
/***
 * 二叉树的表示 [数组表示]
 * 9 34 2185
 *            9(0)
 *       3(1)      4(2)
 *    2(3)  1(4) 8(5)  5(6)
 *
 * 子结点 = 父节点 * 2 + {1|2}
 * 1.树的创建和销毁
 * 2.树的结点的搜索
 * 3.树的结点的添加与删除
 * 4.树中结点的遍历
 */
class Tree
{
    private $tree;

    public function __construct(int $size, $root)
    {
        $array = array();
        $array[0] = $root; //设置根
        for ($i = 1; $i < $size; $i++) {
            $array[$i] = 0;
        }

        $this->tree = $array;
        $this->size = $size;
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        unset($this->tree);
    }

    public function searchNode(int $i)
    {
        if ($i < 0 || $i >= $this->size || 0==$this->tree[$i]) {
            return NULL;
        }
        return $this->tree[$i];
    }

    public function addNode(int $parent, int $direction,  $node)
    {
        if ($parent < 0 || $parent >= $this->size || 0==$this->tree[$parent]) { //判断父节点的下标合法性
            return false;
        }
        $num = $direction==0 ? 1 : 2;

        if (($parent*2 + $num) > $this->size) { //子节点的下标不能超出范围
            return false;
        }

        if ($this->tree[$parent*2 + $num] != 0) { //若子节点已经存在
            return false;
        }

        $this->tree[$parent*2 + $num] = $node;
    }

    public function deleteNode(int $i)
    {
        if ($i < 0 || $i >= $this->size || 0==$this->tree[$i]) { //判断父节点的下标合法性
            return false;
        }

        $this->tree[$i] = 0;
        return true;
    }

    public function treeTraverse()
    {
        $tree = $this->tree;

        for ($i = 0, $l = $this->size; $i < $l; $i++) {
            echo $tree[$i] . "<br/>";
        }
    }
}

$tree = new Tree(10, 01);
$tree->addNode(0, 0, 14);
$tree->addNode(0, 1, 25);
$tree->addNode(1, 0, 36);
$tree->addNode(1, 1, 42);
$tree->addNode(2, 0, 59);
$tree->addNode(2, 1, 67);
$tree->addNode(3, 0, 75);
$tree->addNode(3, 1, 80);
$tree->addNode(4, 0, 94);

$tree->treeTraverse();