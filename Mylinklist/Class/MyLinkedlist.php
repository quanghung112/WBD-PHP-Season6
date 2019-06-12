<?php

include_once "Node.php";
class MyLinkedlist
{
    private $firstNode;

    private $lastNode;

    private $count;

    function __construct()
    {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }

    public function insertFirst($element)
    {
        $link = new Node($element);
        $link->next = $this->firstNode;
        $this->firstNode = $link;
        if ($this->lastNode == NULL)
            $this->lastNode = $link;

        $this->count++;
    }

    public function insertLast($element)
    {
        if ($this->firstNode != NULL) {
            $link = new Node($element);
            $this->lastNode->next = $link;
            $link->next = NULL;
            $this->lastNode = $link;
            $this->count++;
        } else {
            $this->insertFirst($element);
        }
    }

    public function add($index,$element){
        if ($this->isInteger($index)){
            $i=0;
            $current = $this->firstNode;
            while (++$i<$index){
                $current = $current->next;
            }
            $link=new Node($element);
            $link->next=$current->next;
            $current->next=$link;
            $this->count++;
        }else {
            echo "ERROR is MyLinkedlist.add";
        }

    }

    public function contains($element)
    {
        $current = $this->firstNode;
        while ($current != NULL) {
            if ($current->getData() == $element) {
                return 'true';
            }
            $current = $current->next;
        }
        return 'false';
    }

    public function getNode($index)
    {
        $i=0;
        $current = $this->firstNode;
        while ($i++<$index){
            $current = $current->next;
        }
        return $current->getData();
    }

    public function getFirst()
    {
        return $this->firstNode->getData();
    }

    public function getLast(){
        return $this->lastNode->getData();
    }

    public function removeFirst(){
        $this->firstNode=$this->firstNode->next;
        $this->count--;
    }

    public function removeLast(){
       $current=$this->firstNode;
       while ($current->next->next!=null){
           $current=$current->next;
       }
       $current->next=$current->next->next;
       $this->count--;

    }

    public function indexOf($element)
    {
        $i=0;
        $current=$this->firstNode;
        while ($current!=NULL){
            if ($current->getData()==$element){
                return $i;
            }
            $i++;
            $current=$current->next;
        }
    }

    public function removeIndex($index)
    {
        if ($index<=0){
            $this->removeFirst();
        }else if ($index>=$this->count-1){
            $this->removeLast();
        }else {
            $i=0;
            $current = $this->firstNode;
            while (++$i<$index){
                $current = $current->next;
            }
            $current->next=$current->next->next;
            $this->count--;
        }
    }



    public function removeObject($element){
        $this->removeIndex($this->indexOf($element));
    }

    public function size()
    {
        return $this->count;
    }

    public function readList()
    {
        $listData = array();
        $current = $this->firstNode;

        while ($current != NULL) {
            array_push($listData, $current->getData());
            $current = $current->next;
        }
        return $listData;
    }
    public function cloneList($List){
        $current=$this->firstNode;
        while ($current!=null){
            $List->insertLast($current->getData());
            $current=$current->next;
        }
    }

    public function clearList()
    {
       while ($this->count>=0){
          $this->removeFirst();
       }
    }

    public function isInteger($toCheck) {
        return preg_match("/^[0-9]+$/", $toCheck);
    }
}