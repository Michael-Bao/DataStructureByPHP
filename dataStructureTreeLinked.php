<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/27
 * Time: 21:20
 */
class Node
{
    public $index;
    public $data;
    public $lChild;
    public $rChild;
    public $parent;

    public function __construct()
    {
        $this->index  = 0;
        $this->data   = 0;
        $this->lChild = NULL;
        $this->rChild = NULL;
        $this->parent = NULL;
    }

    public function searchNode(int $index)
    {
        if ($this->index == $index) {
            return $this;
        }

        if ($this->lChild != NULL) {
            if ($this->lChild->index == $index) {
                return $this->lChild;
            }
        }

        if ($this->rChild != NULL) {
            if ($this->rChild->index == $index) {
                return $this->rChild;
            }
        }
    }

    public function deleteNode()
    {
        if ($this->lChild != NULL) {
            $this->lChild->deleteNode();
        }

        if ($this->rChild != NULL) {
            $this->rChild->deleteNode();
        }

        if ($this->parent != NULL) {
            if ($this->parent->lChild == $this) {
                $this->parent->lChild = NULL;
            }
            if ($this->parent->rChild == $this) {
                $this->parent->rChild = NULL;
            }

        }

    }

}

class TreeLinked
{
    public $root;

    public function __construct()
    {
        $this->root = new Node();
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->root->deleteNode();
    }

    public function searchNode(int $index)
    {
        return NULL;
    }

    //在父节点下添加节点
    public function addNode(int $nodeIndex, int $direction, Node $node)
    {
        if ($temp = $this->searchNode($nodeIndex) == NULL) {
            return false;
        }

        $child = $direction==0 ? 'lChild' : 'rChild';

        if ($temp->$child != NULL) {//如果已经存在节点
            return false;
        }

        $temp->$child = $node;

        return true;
    }

    public function deleteNode(int $index)
    {
        if ($temp = $this->searchNode($index) == NULL) {
            return false;
        }

        $temp->deleteNode();

        return true;

    }

}