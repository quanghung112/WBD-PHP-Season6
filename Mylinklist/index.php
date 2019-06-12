<?php

/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/26/2018
 * Time: 2:52 AM
 */
include_once('Class/MyLinkedlist.php');

$linkedList = new MyLinkedlist();

$linkedList->insertFirst(11);
$linkedList->insertFirst(22);
$linkedList->insertLast(33);
$linkedList->insertLast(44);
$linkedList->add(2,55);
$linkedList->add(3,66);
//$linkedList->removeIndex(1);
$totalNodes = $linkedList->size();
$linkData = $linkedList->readList();

echo $totalNodes . '<br/>';
echo implode('-', $linkData);
echo '<br>';
$linkedList->removeObject(33);
$totalNodes = $linkedList->size();
$linkData = $linkedList->readList();
echo $totalNodes . '<br/>';
echo implode('-', $linkData);
echo $linkedList->contains(44);
echo '<br>';
echo $linkedList->indexOf(44);
echo '<br>';
$List2= new MyLinkedlist();
$linkedList->cloneList($List2);
echo implode('-',$List2->readList());
echo '<br>';
$linkedList->clearList();
echo implode('-',$linkedList->readList());

