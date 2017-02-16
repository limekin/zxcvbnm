
<?php
$msg="";
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["cname"]))
    {
        $msg="class name required";
        $err='1';

    }
}
?>
<?php require("header.php")?>

<section class="our-contacts" id="contact">
    <h3 class="text-center slideanim" >ADD CLASS</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="row">

<form name="login"method="post"action="#"enctype="multipart/form-data">

    <div class="row">
        <div class="form-group col-lg-12 slideanim">
            <input type="text" name="cname" class="form-control user-name" placeholder=" CLASS NAME" required/>
        </div>
        <div class="form-group col-lg-12 slideanim">
            <button type="submit" name="sub" class="btn-outline1">SUBMIT</button>
        </div>



</form>
                </div>
            </div>
        </div>

</section>
<?php
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE);
$classname=$_POST['cname'];
if(isset($_POST['sub']))
{
    if($err!='1')
    {
        $h="select * from im_class where name='$classname'";
        $e=mysql_query($h);
        if($f=mysql_fetch_array($e))
        {
            echo "<div class='alert alert-danger text-center'><h2><b>< CLASS ALREADY INSERTED!!!</b></h2></div>";

        }
        else
        {
            $a="insert into im_class(name) values('$classname')";
            $b=mysql_query($a);
            if($b)
            {
                echo "<div class='alert alert-success text-center'> <h2><b>CLASS INSERTED...</b></h2>
                    </div>";

            }
            else
            {
                echo "<div class='alert alert-danger text-center'><h2><b> CLASS NOT INSERTED..</b></h2>
                    </div>";
            }
        }
    }
    elseif($err='1')
    {
        echo "<div class='error';> $msg!!!
</div>";
    }

}
?>
<?php require("footer.php")?>
