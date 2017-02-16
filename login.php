<?php
session_start();
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE);
$uname=$_POST['uname'];
$pass=$_POST['p'];
if(isset($_POST['sub']))
{
 $a="select * from login where username='$uname'and password='$pass'";
    $e=mysql_query($a);
    echo "1";
    if($s=mysql_fetch_array($e))
    {
        echo $status=$s['status'];
        if($status==1)
        {
           echo $usertype=$s['user_type'];
            if($usertype=="student")
            {
                $id=$s['id'];
                $_SESSION['tid']=$id;


            }
            elseif($usertype=="admin")
            {
                $id=$s['id'];
                $_SESSION['tid']=$id;

            }
            elseif($usertype=="teacher")
            {
                $id=$s['id'];
                $_SESSION['tid']=$id;

            }
        }
        else
        {
            echo "<script>alert('wait for admins aproval')</script>";

        }
    }
    else
    {

        echo "<script>alert('username or password error')</script>";
    }
}
?>
<?php require("header.php")?>
    <section class="our-contacts" id="contact">
        <h3 class="text-center slideanim" >LOGIN</h3>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                        <div class="row">

<form name="login"method="post"action="#"enctype="multipart/form-data">
    <div class="row">
        <div class="form-group col-lg-6 slideanim">
            <input type="text" name="uname" class="form-control user-name" placeholder="Your User Name" required/>
        </div>
        <div class="form-group col-lg-6 slideanim">
            <input type="password" name="p" class="form-control user-name" placeholder="Your Password" required/>
        </div>

        <div class="form-group col-lg-12 slideanim">
            <button type="submit" name="sub" class="btn-outline1">Submit</button>
        </div>



    </div>
</form>
                        </div>
                </div>
            </div>
    </section>
<?php require("footer.php")?>