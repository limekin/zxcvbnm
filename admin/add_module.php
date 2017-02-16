
<?php
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE);
$msg="";
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["cname"]))
    {
        $msg="subject name required";
        $err='1';

    }
}
?>
<?php require("header.php")?>
<section class="our-contacts" id="contact">
    <h3 class="text-center slideanim" >ADD MODULE</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

<form name="login"method="post"action="#"enctype="multipart/form-data">

    <div class="form-group col-lg-6 slideanim">
        <select  name="c1name" class="form-control user-name" >
            <option value="">SELECT COURSE</option>
            <?php
            echo $query="select * from course";
            $s=mysql_query($query);
            while($e=mysql_fetch_array($s))
            {
                echo"<option value='".$e["id"]."'>".$e["name"]."</option>";

            }
            ?>
        </select>

    </div>

    <div class="row">
        <div class="form-group col-lg-6 slideanim">
            <input type="text" name="cname" class="form-control user-name" placeholder="ADD MODULE" required/>
        </div>
        <tr>
        <div class="form-group col-lg-12 slideanim">
            <button type="submit" name="sub" class="btn-outline1">Submit</button>
        </div>



</form>
                </div>
            </div>
        </div>
</section>
<?php

$classname=$_POST['cname'];
$subjectname=$_POST['c1name'];

if(isset($_POST['sub']))
{
    if($err!='1')
    {
        $h="select * from im_subjects where name='$classname' and course_id='$subjectname'";
        $e=mysql_query($h);
        if($f=mysql_fetch_array($e))
        {
            echo "<div class='alert alert-danger text-center'><h2><b> SUBJECT ALREADY INSERTED!!!</b></h2></div>";

        }
        else
        {
            $a="insert into im_subjects(name,course_id,user_id) values('$classname','$subjectname','7')";
            $b=mysql_query($a);
            if(mysql_errno()!=0)
            {
                echo mysql_error();
            }
            if($b)
            {
                echo "<div class='alert alert-success text-center'> <h2><b> SUBJECT INSERTED...</b></h2>
                    </div>";

            }
            else
            {
                echo "<div class='alert alert-danger text-center'><h2><b> SUBJECT NOT INSERTED...</b></h2>
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


