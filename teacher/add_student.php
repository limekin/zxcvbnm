<?php
$x = mysql_connect("localhost", "root", "");
mysql_select_db("opencourse");
error_reporting(E_ALL ^ E_NOTICE)
?>
<?php
$err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (count($_POST) > 0) {
        $user = $_POST['users_id'];
        $mob = $_POST['mobile'];
        $em = $_POST['email'];
        if (!preg_match("/^[a-zA-Z0-9]+$/", $user)) {
            $message = "Registration number must only contain letters/numbers no space!";
            $err = '1';

        } else if (!preg_match("/^[0-9]{10}$/", $mob)) {
            $message = "Contact must only contain 10 numbers!";
            $err = '1';

        }
    }
    if (count($_POST) > 0) {
        foreach ($_POST as $key => $value) {
            if (empty($_POST[$key])) {
                $message = ucwords($key) . "Field is required";
                $err = '1';
                break;
            }
        }
    }
}
?>
<?php
if (isset($_POST['sub'])) {
    echo "6";
//var_dump($_POST);
    if ($err != '1') {
        echo $reg = $_POST['users_id'];
        echo $cou = $_POST['course'];
        $nam = $_POST['name'];
        $gnd = $_POST['gender'];
        $dob = $_POST['dob'];
        $add = $_POST['address'];
        $email = $_POST['email'];
        $image = $_FILES["images 2"]["name"];
        $mob = $_POST['mobile'];
        $sem = $_POST['class'];
        $pare = $_POST['pmark'];
        ?>
        <?php
        $d = "select * from login where username='$reg'";
        $e = mysql_query($d);
        $temp = mysql_fetch_array($e);
        if ($temp) {
            echo "<div class='alert alert-danger text-center'><h2><b> REGISTRATION NUMBER ALREADY EXITS!!!</b></h2></div>";

        } else {
            if ($_FILES["images 2"]["error"] > 0) {
                echo $_FILES["images 2"]["error"];

            } elseif (file_exists("images 2/" . $_FILES["images 2"]["name"])) {
                echo "<div class='alert alert-danger text-center'><h2><b>TAKE OTHER IMAGE</b></h2></div>";

            } else {
                {
                    move_uploaded_file($_FILES["images 2"]["tmp_name"], "images 2/" . $_FILES["images 2"]["name"]);
                    echo "<div class='alert alert-info text-center';>IMAGE SAVED</div>";
                }

                echo $qery = "insert into login(username,password,user_type,status)values('" . $reg . "','" . $dob . "','student','0')";
                $D = mysql_query($qery);
                $log_id = mysql_insert_id();
                $ins = "insert into im_users(login_id,`name`,dob,image,gender,address,email,mobile)values('$log_id','$nam','$dob','$image','$gnd','$add','$email','$mob')";
                $suc = mysql_query($ins);
                $ins1 = "insert into student(user_id,class,plustwomark)values('$log_id','$sem','$pare')";
                $suc1 = mysql_query($ins1);
                if (mysql_errno() != 0) {
                    echo mysql_error();

                }
                if ($suc && $suc1) {
                    echo "<div class='alert alert-success text-center'> <h2><b>STUDENT REGISTERED....</b></h2></div>";

                }
            }
        }
    } else {
        echo "<div class='alert alert-danger text-center'><h2><b>$message!!!!</b></h2></div>";

    }
}
?>





<!--<!DOCTYPE>
<html>
<head>
    <title>ADD STUDENT</title>
    <style>
        .success{
            color:darkblue;text-align: center;font-size: 25px;font-family: sans-serif;
        }
        .saved{
            color:forestgreen;text-align: center;font-size: 25px;font-family: sans-serif;
        }
        .error{
            color:#FF0000;text-align: center;font-size: 25px;font-family: sans-serif;
        }
        </style>
    </head>
    <body>
<div class="wrapper">-->
<?php require("header.php") ?>
<style>
    input[type='radio'] {
        height: 25px;
        width: 30px;
    }

    .zx {
        line-height: 50px;
        vertical-align: top;
    }
</style>
<section class="our-contacts" id="contact">
    <h3 class="text-center slideanim">STUDENT REGISTRATION</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <form action="#" method="post" name="frm" id="frm" enctype="multipart/form-data">
                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="users_id" class="form-control user-name" placeholder="Your Reg No"
                                   required/>
                        </div>
<!--                        <div class="form-group col-lg-6 slideanim">-->
<!--                            <select name="course" class="form-control user-name">-->
<!--                                <option value="">COURSE NAME</option>-->
<!--                                --><?php
//                                echo $query = "select * from course";
//                                $s = mysql_query($query);
//                                while ($e = mysql_fetch_array($s)) {
//                                    echo "<option value='" . $e["id"] . "'>" . $e["name"] . "</option>";
//
//                                }
//                                ?>
<!--                            </select>-->
<!---->
<!--                        </div>-->


                        <div class="form-group col-lg-6 slideanim">
                            <select name="class" class="form-control user-name">
                                <option value="">CLASS NAME</option>
                                <?php
                                echo $query = "select * from department";
                                $s = mysql_query($query);
                                while ($e = mysql_fetch_array($s)) {
                                    echo "<option value='" . $e["class_id"] . "'>" . $e["name"] . "</option>";

                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="name" class="form-control user-name" placeholder="NAME" required/>
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

                        <div class="form-group col-lg-2 slideanim">

                            <input type="radio" name="gender" value="female" class=" user-name"/> <span class="zx">Female</span>
                            <input type="radio" name="gender" value="female" class="user-name"/> <span
                                class="zx">Male</span>
                        </div>
                        <div class="form-group col-lg-4 slideanim">

                            <input type="file" name="images" title=" " id="files" class="form-control user-name"
                                   class="hidden" required
                                   style="display:none;"/>
                            <label for="files" class="user-name">Click me to upload profile image</label>

                        </div>
                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="pmark" class="form-control user-name" placeholder="PLUS TWO MARK"
                                   required/>
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
