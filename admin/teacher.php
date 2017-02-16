

<?php
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE)
?>
<?php
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(count($_POST)>0)
    {
        $user=$_POST['regno'];
        $mob=$_POST['mobile'];
        $em=$_POST['email'];
        if(!preg_match("/^[a-zA-Z0-9]+$/",$user))
        {
            $message="Registration number must only contain letters/numbers no space!";
            $err='1';

        }
        else if(!preg_match("/^[0-9]{10}$/",$mob))
        {
            $message="Contact must only contain 10 numbers!";
            $err='1';

        }
        else if(!filter_var($em,FILTER_VALIDATE_EMAIL))
        {
            $message="valid email needed!";
            $err='1';

        }

    }
    if(count($_POST)>0)
    {
        foreach($_POST as $key=>$value)
        {
            if(empty($_POST[$key]))
            {
                $message=ucwords($key)."field is required";
                $err='1';
                break;
            }
        }
    }
}
?>
<?php
if(isset($_POST['sub']))
{
    if($err!='1')
    {
        $reg=$_POST['regno'];
        $nam=$_POST['name'];
        $gnd=$_POST['asp'];
        $dob=$_POST['dob'];
        $pare=$_POST['pname'];
        $phone=$_POST['mobile'];
        $image=$_FILES["images"]["name"];
        $add=$_POST['address'];
        $email=$_POST['email'];

        $dept=$_POST['class'];


        ?>
        <?php
        $d="select * from login where username='$reg'";
        $e=mysql_query($d);
        $temp=mysql_fetch_array($e);
        if($temp)
        {
            echo"<div class='alert alert-danger text-center'><h2><b>TEACHERS ID ALREADY EXIST!!!!!</b></h2></div>";

        }
        else
        {
            if($files["images"]["error"]>0)
            {
                echo $_FILES["images"]["error"];

            }
            elseif(file_exists("images/".$_FILES["images"]["name"]))
            {
                echo "<div class='alert alert-danger text-center'><h2><b>TAKE OTHER IMAGE</b></h2></div>";

            }
            else
            {
                {
                    move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$_FILES["images"]["name"]);
                    echo "<div class='alert alert-info text-center';><h2><b>IMAGE SAVED</b></h2> </div>";

                }
                 $query="insert into login(username,password,user_type,status)values('".$reg."','".$dob."','teacher','1')";
                mysql_query($query);
                if(mysql_errno()!=0)
                {
                    echo mysql_errno();
                }
                $log_id=mysql_insert_id();
                 $ins="insert into im_users(login_id,name,dob,image,gender,address,email,mobile)values('$log_id','$nam','$dob','$image','$gnd','$add','$email','$phone')";
                $suc=mysql_query($ins);
                $ins1="insert into im_teacher(loginid,dept)values('$log_id','$dept')";
                $suc1=mysql_query($ins1);
                if((mysql_errno()!=0))
                {
                    echo mysql_error();
                }
                if($suc&&$suc1)
                {
                    echo "<div class='alert alert-success text-center'> <h2><b>TEACHER REGISTERED....</b></h2></div>";
                }


            }
        }
    }
    else
    {
        echo "<div class='alert alert-danger text-center'><h2><b>$message!!!!</b></h2></div>";
    }
}
?>
<style>
    input[type='date']:before{
        content: attr(placeholder)
    }
</style>

<?php require("header.php") ?>
<script>
    function showCompany()
    {
        document.frm.submit();
    }
</script>

<div class="wrapper">

    <section class="our-contacts" id="contact">




    <h3 class="text-center slideanim">TEACHER REGISTRATION</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <form action="#" method="post" name="frm" id="frm" enctype="multipart/form-data">
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
                        </div>

<!--                        <div class="form-group col-lg-6 slideanim">-->
<!---->
<!--                                <select name="dept" onchange="showCompany(this.value);" class="form-control user-name"  >-->
<!--                                    <option value="">DEPARTMENT</option>-->
<!--                                    --><?php
//                                    $sql1="select * from im_class";
//
//                                    $sql_row1=mysql_query($sql1);
//                                    while($sql_res1=mysql_fetch_array($sql_row1))
//                                    {
//                                        ?>
<!--                                        <option value="--><?php //echo $sql_res1["class_id"];?><!--"--><?php
//                                        if($sql_res1["class_id"]==$_REQUEST["name"])
//                                        {
//                                            echo "selected";
//                                        }
//                                        ?><!--<!--><?php //echo $sql_res1["name"];?><!--</option>-->
<!---->
<!--                                    --><?php
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                        </div>-->


<!--                            <div class="form-group col-lg-6 slideanim">-->
<!--                                <select name="class" class="form-control user-name">-->
<!--                                    <option value="">SUBJECTS</option>-->
<!--                                    --><?php
//                             $sql1="select * from im_subjects where course_id='$_REQUEST[course]'";
//                                    $sql_row1=mysql_query($sql1);
//                                    while($sql_res=mysql_fetch_array($sql_row1))
//                                    {
//                                        ?>
<!--                                        <option value="--><?php //echo $sql_res["subjects_id"];?><!--">--><?php //echo $sql_res["name"];
//                                            ?>
<!--                                        </option>-->
<!--                                    --><?php
//                                    }
//                                    ?>
<!--                                </select>-->
<!--                            </div>-->
                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="regno"  class="form-control user-name" placeholder="ID"
                                   required/>
                        </div>

                            <div class="form-group col-lg-6 slideanim">
                                <input type="text" name="name"class="form-control user-name" placeholder="NAME" required/>
                            </div>
                            <div class="form-group col-lg-6 slideanim">

                                <input class="form-control" name="dob" type="date" placeholder="Date of Birth :"  id="example-date-input">

                            </div>

                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="address" class="form-control user-name" placeholder="ADDRESS"
                                   required/>
                        </div>
                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="email" class="form-control user-name" placeholder="EMAIL"
                                   required/>
                        </div>
                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="mobile" class="form-control user-name" placeholder="CONTACT NO"
                                   required/>
                        </div>

                        <div class="form-group col-lg-6 slideanim">



                                <select name="asp" class="form-control" id="sel1">
                                    <option value="">GENDER</option>
                                    <option value="male">MALE</option>
                                    <option value="female">FEMALE</option>

                                </select>

                        </div>


                        <div class="form-group col-lg-6 slideanim">

                            <input type="file" name="images" title=" " id="files"
                                   class="hidden" required
                                   style="display:none;"/>
                            <label for="files" class="form-control user-name">CLICK ME TO UPLOAD IMAGE</label>

                        </div>

                        <div class="form-group col-lg-12 slideanim">

                            <input type="submit" name="sub" class="btn-outline1" value="Submit" class="btn-outline1">
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require("footer.php") ?>
