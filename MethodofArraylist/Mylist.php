<?php


class Mylist
{
    const DEFAULT_CAPACITY=10;
    public $size;
    public $objectElement;

    public function __construct()
    {
        $this->size = 0;
        $this->objectElement = [];
    }

    public function Mylist($arr = "")
    {
        if (is_array($arr) == true)
            $this->objectElement = $arr;
        else
            $this->objectElement = array();
    }

    public function toSize()
    {
        $this->size = count($this->objectElement);
        return $this->size;
    }

    public function add($index, $element)
    {
        $array=[];
        if ($this->isInteger($index)) {
            for ($i = 0; $i < $this->toSize(); $i++) {
                if ($index != $i) {
                    array_push($array, $this->objectElement[$i]);
                } else {
                    array_push($array, $element);
                    array_push($array, $this->objectElement[$i]);
                }
            }
            $this->objectElement = $array;
        } else {
                die("ERROR in MyList.add <br> Integer value required");
        }
    }

    public function remove($index)
    {
        if ($this->isInteger($index)) {
            $newMyList = array();

            for ($i = 0; $i < $this->toSize(); $i++)
                if ($index != $i) $newMyList[] = $this->get($i);

            $this->objectElement = $newMyList;
        } else {
            die("ERROR in MyList.remove <br> Integer value required");
        }
    }

    public function toClone()
    {
        $myList = $this->objectElement;
        return $myList;
    }

    public function isInteger($toCheck)
    {
        return preg_match("/^[0-9]+$/", $toCheck);
    }

    public function contains($object)
    {
        for ($i = 0; $i < $this->toSize(); $i++) {
            if ($this->objectElement[$i] == $object) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function indexOf($object)
    {
        for ($i = 0; $i < $this->toSize(); $i++) {
            $not=false;
            if ($this->objectElement[$i] == $object) {
                return $i;
            }
        }
        return -1;
    }
    public function addLast($element){
        array_push($this->objectElement, $element);
        return true;
    }

    public function ensureCapacity($minCapacity){

    }
    public function clear()
    {
        $this->objectElement = array();
    }

    /**
     * Trả về phần tử tại vị trí đã chỉ định trong danh sách này
     * @param $index
     **/
    public function get($index)
    {
        if ($this->isInteger($index) && $index < $this->toSize()) {
            return $this->objectElement[$index];

        } else {
            die("ERROR in MyList.get");
        }
    }

    public function toMylist(){
        return $this->objectElement;
    }

}