<html>
<body>ADMIN APPROVED
<?php
$x=mysql_connect("localhost","root","");
if($x)
{
    "connected";

}
mysql_select_db("opencourse");
$ab=$_REQUEST['id'];
$b="update login set status=1 where id='$ab'";
mysql_query($b);

?>