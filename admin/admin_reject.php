<?php
$x=mysql_connect("localhost","root","");
if($x)
{
    echo "connected";

}
mysql_select_db("opencourse");
echo $ab=$_REQUEST['id'];
$b="delete from login where id=$ab";
$c="delete from im_teacher where login_id=$ab";
mysql_query($b);
mysql_query($c);


?>