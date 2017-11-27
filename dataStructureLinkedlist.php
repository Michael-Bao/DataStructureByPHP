<?php
/**
 * Created by PhpStorm.
 * User: 1
 * Date: 2017/11/23
 * Time: 16:06
 */
/**
 * Class Linkedlist
 * 链表区分于线性表
 *   优势：增加或删除的效率高
 *   劣势：链表中的元素在内存中不是顺序存储的，而是通过元素中的指针联系到一起。访问链表中的元素，需要从第一个元素开始，直到找到的元素位置。
 * 1.初始化 __construct() //
 * 2.销毁   __destruct()
 * 3.清空   clearList() //没线性表那么容易，需要一个一个清
 * 4.为空   listEmpty()
 * 5.长度   listLength()
 * 6.从链头插入    listInsertHead(Node $node)
 * 7.从链尾插入    listInsertTail(Node $node)
 * 8.从某个序号插入    listInsert(int $i, Node $node)
 * 8.1从某个元素前插入 listInsertBefore($data, Node $node)
 * 8.2从某个元素后插入 listInsertAfter($data, Node $node)
 * 9.删除某个元素（根据顺序)  listDelete(int $i)
 * 9.1删除某个元素（根据值）  listDeleteByData($data)
 * 10.查找第 i 个元素的值    getElem(int $i)
 * 11.查找某个元素的位置     locateElem($data)
 * 12.查找前驱的值           priorElem(Node $node)
 * 13.查找后继的值           nextElem(Node $node)
 * 14.遍历                  listTraverse()
 *
 * private :
 *   $list
 *   $length
 *
 */
class Node
{
    public $data;//数据域
    public $next;//指针域

    public function __construct($data, $next=null)
    {
        $this->data = $data;
        $this->next = $next;
    }

    public function printNode()
    {
        echo $this->data . "<br/>";
    }
}

class Linkedlist
{
    private $header;
    private $length;

    public function __construct($data = null)
    {
        $this->header = new node($data, null);
        $this->length = 0;
    }

    //析构函数，将链清空，然后把头结点也注销
    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->clearList();
        unset($this->header);
        $this->header = null;
    }

    //将链清空，只剩下头结点
    public function clearList()
    {
        $current = $this->header->next;
        while($current != null) {
            $temp = $current->next;
            unset($current);
            $current = $temp;
        }

        $this->header->next = null;
        $this->length = 0;
    }

    public function listEmpty()
    {
        return 0 == $this->length;
        //return $this->header == null;
    }

    //获取链表长度
    public function listLength()
    {
        return $this->length;

        /*$i = 0;
        $current = $this->header;
        while ($current->next != null) {
            $i++;
            $current = $current->next;
        }

        return $i;*/
    }

    //从头结点插入节点
    public function listInsertHead(Node $node)
    {
        $node->next = $this->header->next;
        $this->header->next = $node;

        $this->length++;

        return true;
    }

    //从尾巴加入元素
    public function listInsertTail(Node $node)
    {
        $current = $this->header;
        while ($current->next != null) {
            $current = $current->next;
        }

        $node->next = $current->next;
        $current->next = $node;

        $this->length++;

        return true;
    }

    //在某个位置插入元素
    public function listInsert(int $i, Node $node)
    {
        if ($i < 0 || $i > $this->length) {
            return false;
        }

        $current = $this->header;

        for ($k = 0; $k < $i; $k++) {
            $current = $current->next;
        }

        $node->next = $current->next;
        $current->next = $node;

        $this->length++;

        return true;
    }

    //在某个位置删除元素
    public function listDelete(int $i)
    {
        if ($i < 0 || $i >= $this->length) {
            return false;
        }
        $current = $this->header;
        for ($k = 0; $k < $i; $k++) {//到目标的前一个停下
            $current = $current->next;
        }

        $temp = $current->next;
        $current->next = $temp->next;
        unset($temp);
        //$current->next = $current->next->next;//将下一个节点直接转到下下一个

        $this->length--;

        return true;
    }

    //查找第 $i 个元素
    public function getElem(int $i)
    {
        if ($i < 0 || $i >= $this->length) {
            return false;
        }
        $current = $this->header;
        for ($k = 0; $k < $i; $k++) {//到目标的前一个停下
            $current = $current->next;
        }

        return $current->next->data;
    }

    //查找是否存在某个元素，有则返回第一次出现的位置
    public function locateElem($data)//(Node $node)
    {
        $current = $this->header;
        $count = 0;
        while($current->next != NULL) {
            $current = $current->next; //从第 0 个结点开始
            if ($current->data == $data) {
                return $count;
            }
            $count++;
        }
        return -1;
    }

    //查找某元素的前驱
    public function priorElem(Node $node)
    {
        $current = $this->header;
        while ($current->next != NULL) {
            $prior = $current; //保存前驱，以备调用
            $current = $current->next;

            if ($current->data == $node->data) {
                if ($prior == $this->header) {//头结点不算元素
                    return false;
                }
                return $prior->data;
            }
        }
        return false;

    }

    //查找某元素的后继
    public function NextElem(Node $node)
    {
        $current = $this->header;
        while ($current->next != NULL) {
            $current = $current->next;

            if ($current->data == $node->data) {
                if ($current->next != NULL) {//最后一个结点没有后继
                    return $current->next->data;
                }
            }
        }
        return false;

    }

    public function listTraverse()
    {
        $current = $this->header;
        while ($current->next != null) {
            $current = $current->next;
            $current->printNode();
        }
    }

}

$list = new Linkedlist();
var_dump($list->listEmpty());
$list->listInsertTail(new Node('yi'));
$list->listInsertTail(new Node('er'));
$list->listInsertTail(new Node('san'));

$list->listInsertHead(new Node('zero'));

$list->listTraverse();
var_dump($list->listEmpty());
//$list->clearList();
//var_dump($list->listEmpty());

$list->listInsert(2, new Node('er--cha ru'));
$list->listTraverse();
$list->listDelete(2);
$list->listTraverse();
echo $list->getElem(3);
echo $list->locateElem('yi');
echo $list->priorElem();



