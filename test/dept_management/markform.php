
<?php
include("session.php")
?>

<?php
$con=mysqli_connect("localhost","root","root","dept_mgmt")or die("error in connection");
//session_start();
if(isset($_POST['sub']))
{

    $cid=$_POST['courseid'];
    $_SESSION['course']=$cid;
    $sid=$_POST['semester'];
    $_SESSION['semester']=$sid;
    $subject=$_POST['subject'];
    $_SESSION['subject']=$subject;

    $examname=$_POST['examname'];

    $exam="insert into exam(name) values('".$examname."') ";
    if(!mysqli_query($con,$exam))
    {
        echo mysqli_error($con);

    }
    $examid="select id from exam ORDER BY id DESC LIMIT 1"  ;

    if(!mysqli_query($con,$examid))
    {

        echo mysqli_error($con);

    }
    else
    {   $result=mysqli_query($con,$examid);
        if($exm=mysqli_fetch_array($result))
        {
            $exmid=$exm['id'];
            $_SESSION['exam']=$exmid;

        }




    }



?>




<html>
<table>
    <tr>
        <td>
            <h3>Course  :<?php


                $nameselector="select name from courses where id='$cid'";
                $cresult=mysqli_query($con,$nameselector);
                $cname=mysqli_fetch_array($cresult);
                echo $cname['name'];
                ?>



            </h3></td>
        <td style="padding-left: 50px"> <h3> Semester  :

                <?php
                $nameselector="select name from semester where id='$sid'";
                $cresult=mysqli_query($con,$nameselector);
                $cname=mysqli_fetch_array($cresult);
                echo $cname['name'];


                ?>
            </h3>
        </td>
</tr>
    </table>
<form action="adding.php" method="post" name="form">
    <table border="1" align="center"  >

        <tr>

            <td  style="width: 200px">NAME</td>

            <td  style="width: 160px">MARK</td>


        </tr>


        <?php

    $x=mysqli_connect("localhost","root","root","dept_mgmt");

    $qry="select user_id from students where course_id='$cid' and semester_id='$sid'";

$v=mysqli_query($x,$qry);

        $i=0;$j=0;
    while($b=mysqli_fetch_array($v))
    {


        $user=$b['user_id'];
        $userarray[$j]=$user;$j++;

    $query="SELECT name FROM users where login_id='$user'  ";

    $s=mysqli_query($x,$query);

    while($p=mysqli_fetch_array($s))
    {
        ?>

        <tr>
            <td>
                <?php echo $p['name']  ?>

            </td>
            <td>

                <input type="text" name="<?php echo $i;$i++; ?>">

            </td>


        </tr>


    <?php
    }}

        $_SESSION['i']=$i;
     if($i>1)   $_SESSION['userarray']=$userarray;
        ?>


</table>



<h3 align="center"><input  type="submit" name="upload" value="upolad"></h3>
</form>
</body>

</html>
<?php
}



?>