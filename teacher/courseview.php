<?php
session_start();
$s=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
$teachId = $_SESSION['tid'];
if(!isset($_REQUEST['tid']))
{
    header('location:course_view1.php');
    exit;
}
$id=$_REQUEST['tid'];
require("header.php");?>


else{
    header("location:course_view1.php");
}
