<?php
session_start();
$con=mysqli_connect("localhost","root","root","dept_mgmt")or die("error in connection");
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['upload']))
    {

        $userarray[]=$_SESSION['userarray'];
        $cid=$_SESSION['course'];
        $sid=$_SESSION['semester'];
        $i=$_SESSION['i'];
        $examid= $_SESSION['exam'];
        $subject=$_SESSION['subject'];
        $m=0;
        $u=0;




        $qry="select user_id from students where course_id='$cid' and semester_id='$sid'";

        $v=mysqli_query($con,$qry);

        $j=0;
        while($i>$j && $b=mysqli_fetch_array($v))
        {
            $mark=$_POST[$m];

            $query="insert into mark(subject_id,exam_id,mark,user_id) values ('".$subject."','".$examid."','".$mark."','".$b['user_id']."')";
            if(mysqli_query($con,$query))
            {

            }
            else
            {

                echo mysqli_error($con);
            }
            $j++;
            $m++;
        }
        echo"'.$j.' notification sent !";
        echo("<html><a href='TEACHER_HOME.php'>click to continue</html>");

    }


}






?>
