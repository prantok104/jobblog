 <?php

  // Inialize session
session_start();
include('connection.php');
echo $id =  $_SESSION['user_id'];
// Delete certain session
  unset($_SESSION['user_id']);
  unset($_SESSION['user_name']);
  unset($_SESSION['password']);

if($id){
    $sql = "UPDATE users SET action = 0 WHERE id = '$id'";
    $result = mysql_query($sql);
    header('Location: login.php');
}

  ?>