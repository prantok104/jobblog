<?php

$db = new mysqli('localhost','root','','blog3');
if($db->connect_error){
    die('database are not connected').mysqli_errno();
}else{
    return $db;
}