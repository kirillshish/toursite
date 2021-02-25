<?php
session_start();
setcookie("user",1,strtotime("+30 days"));
require "config.php";

if($_SESSION['status']=='user'){
    $action .= ($_GET['act'])?($_GET['act']):'Index';
    $user = new C_User;
    $user->render($action);
}elseif($_SESSION['status']=='admin'){
    $action .= ($_GET['act'])?($_GET['act']):'Index';
    $admin = new C_Admin;
    $admin->render($action);
}else{
    $action .= ($_GET['act'])?($_GET['act']):'Index';
    $render = new C_Page;
    $render->render($action);
}


