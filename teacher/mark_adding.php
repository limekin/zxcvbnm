<?php
session_start();
$con=mysqli_connect("localhost","root","")or die("error in connection");
if($_SERVER['REQUEST_METHOD']=='POST')
{
    if(isset($_POST['upload']))
    {

        $userarray[]=$_SESSION['userarray'];
        $cid=$_SESSION['course'];

        $i=$_SESSION['i'];
        $examid= $_SESSION['exam'];
        $subject=$_SESSION['subject'];
        $m=0;
        $u=0;




        $qry="select user_id from student where preffered_course_id='$cid' ";

        $v=mysqli_query($con,$qry);

        $j=0;
        while($i>$j && $b=mysqli_fetch_array($v))
        {
            $mark=$_POST[$m];

            $query="insert into mark(exam_name,user_id,mark) values ('".$examid."','".$b['user_id']."','".$mark."')";
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
