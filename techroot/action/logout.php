<?php
session_start();
if(session_destroy()){
    header('location:../../../blog4/login.php');
}

