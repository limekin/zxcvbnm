<?php
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE)
?>
<?php
$msg="";
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(empty($_POST["cname"]))
    {
        $msg="course name required";
        $err='1';

    }
}
?>
<?php require("header.php")?>
<section class="our-contacts" id="contact">
    <h3 class="text-center slideanim" >ADD COURSE</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="row">


<form name="login"method="post"action="#"enctype="multipart/form-data">
    <div class="row">

        <div class="form-group col-lg-6 slideanim">
            <select name="class" class="form-control user-name">
                <option value="">CLASS NAME</option>
                <?php
                echo $query = "select * from im_class";
                $s = mysql_query($query);
                while ($e = mysql_fetch_array($s)) {
                    echo "<option value='" . $e["class_id"] . "'>" . $e["name"] . "</option>";

                }
                ?>
            </select>

<!--            <select name="course"  class="form-control user-name"  >-->
<!--                <option value="">class</option>-->
<!--                --><?php
//                $sql1="select * from im_class";
//
//                $sql_row1=mysql_query($sql1);
//                while($sql_res1=mysql_fetch_array($sql_row1))
//                {
//                    ?>
<!--                    <option value="--><?php //echo $sql_res1["name"];?><!--"--><?php
//                    if($sql_res1["class_id"]==$_REQUEST["im_class"])
//                    {
//                        echo "selected";
//                    }
//                    ?><!-->
<!--                        --><?php //echo $sql_res1["name"];?><!--</option>-->
<!---->
<!--                --><?php
//                }
//                ?>
<!--            </select>-->
        </div>
        <div class="form-group col-lg-6 slideanim">
            <input type="text" name="cname" class="form-control user-name" placeholder=" COURSE NAME" required/>
        </div>
        <div class="form-group col-lg-12 slideanim">
            <button type="submit" name="sub" class="btn-outline1">Submit</button>
        </div>



</form>
                </div>
            </div>
        </div>
</section><?php
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE);
$classname=$_POST['cname'];
$dept=$_POST['class'];
if(isset($_POST['sub']))
{
    if($err!='1')
    {
        $h="select * from course where name='$classname'";
        $e=mysql_query($h);
        if($f=mysql_fetch_array($e))
        {
            echo "<div class='alert alert-danger text-center'><h2><b> COURSE ALREADY INSERTED!!!</b></h2></div>";

        }
        else
        {
            $a="insert into course(name,dept) values('$classname','$dept')";
            $b=mysql_query($a);
            if($b)
            {
                echo "<div class='alert alert-success text-center'> <h2><b>COURSE INSERTED...</b></h2>
                    </div>";

            }
            else
            {
                echo "<div class='alert alert-danger text-center'><h2><b> > COURSE NOT INSERTED...</b></h2>
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



