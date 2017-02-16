<?php


//include('admin_header.php');
?>
<html>
<head><center><h1 style ="font-family:segoe scrip ;">ADMIN APPROVE</h1></center></head></center>
<center>
    <body>
    <?php
    $x=mysql_connect("localhost","root","");
    if($x)
    {
        "connected";

    }
    mysql_select_db("opencourse");
    $a="SELECT login.id,im_users.name,im_users.gender,im_users.email,login.status FROM login,im_users where login.id=im_users.login_id and login.status=0";
    $set= mysql_query($a);
    while($row= mysql_fetch_array($set))
    {
        ?>
        <form name="approve" action="#" method="post" ">
    <center>
        <table>
            <tr>
                <td><?php  echo $row['id']?></td>

                <td><?php  echo $row['name']  ?></td>
                <td><?php  echo $row['gender']  ?></td>

                <td><?php  echo $row['email']  ?></td>

                <td><?php   $row['status']  ?></td>


                <td>
                    <a href="admin_appr.php?id=<?php echo $row['id']?>">approve</a>
                </td>
                <td>
                    <a href="admin_reject.php.?id=<?php echo $row['id']?>">reject</a>

                </td>

            </tr>

    </center>
          </table>


<?php

}

    ?>
    <table>
        <tr>
            <td>
                <a href="admin_home.php"><input type="button" name="back" value="back"></a>
            </td>
        </tr>
    </table>
    </body>
</center>
</form>
</html>