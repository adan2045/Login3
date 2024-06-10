<?php
session_start();

if (!isset($_SESSION ['flag'])){
    $_SESSION ['flag']=false;
    header('Location:login.php');
    exit();
}else{
     if ($_SESSION ['flag']==false){
        header('Location:login.php');
        exit();
     } 
}