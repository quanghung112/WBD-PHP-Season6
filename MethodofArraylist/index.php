<?php
include "Mylist.php";
$MyListTest=new Mylist();
$MyListTest->addLast(1);
$MyListTest->addLast(2);
$MyListTest->addLast(3);
$MyListTest->addLast(4);
$MyListTest->addLast(5);
$MyListTest->addLast(6);
echo implode($MyListTest->toMylist())."<br>";
$MyListTest->add(3,7);
echo implode($MyListTest->toMylist())."<br>";
$MyListTest->remove(2);
echo implode($MyListTest->toMylist())."<br>";

