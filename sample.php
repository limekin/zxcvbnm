<?php
//include('header.php');
//include('db.php');
if(isset($_POST['sub']))
{

    $name=$_POST['txt_name'];
    $class=$_POST['txt_gender'];
    $department=$_POST['txt_dept'];
    $address=$_POST['txt_address'];
    $city=$_POST['txt_city'];
    $mobile_number=$_POST['txt_mob'];
    $email=$_POST['txt_email'];
    $username=$_POST['txt_user'];
    $password=$_POST['txt_pass'];
    $cpassword=$_POST['txt_cpass'];


    $check1="select * from login where user_name='$username'";
    $a=mysql_query($check1);
//   $num= mysql_num_rows($a);
    $p=mysql_num_rows($a);
    if($p>0)
    {
        echo "USERNAME ALREADY EXIST";
    }
    else
    {

        $qry="insert into login(user_type,user_name,password,status)values('user','$username','$password','0')";
        mysql_query($qry);
        echo "successfully registered";
//            echo "<br>";
        $rst="select * from login where user_name='$username'";
        $set= mysql_query($rst);
        while($row= mysql_fetch_array($set))
        {
//                echo "hai";
            $main_id=$row['log_id'];
//                echo"<br>";
            $qrytwo="insert into register(log_id,stud_name,gender,department,address,city,phone_no,email) values('$main_id','$name','$gender','$department','$address','$city','$mobile_number','$email')";
            $results=mysql_query($qrytwo);
//                if($results >0)
//                {  echo "inserted register";
//                    header("location:loging.php");
//                }
//                else{
//                    echo "Not inserted";
//                }
//
//
//            }
        }
//        else{
//            echo "password does not match";
//
//        }
    }

}
?>

<style>
    #log
    {
        width:100px;height:30px;background-color: #1ACAB8;margin-top: 10px;border-radius: 5px;
    }
</style>
<div class="banner-bottom" STYLE="background-color: #00c3f9">
    <div class="container">
        <h3 class="tittle">REGISTRATION</h3>
        <div class="col-md-12 bottom-grid">

            <center>
                <form name="registration" action="#" method="post" enctype="multipart/form-data">
                    <table  width="200">
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="txt_name" value="" id="input"></td>
                        </tr>
                        <tr>
                            <td>User</td>
                            <td><input type="radio" name="txt_user" value="teacher">teacher<br><input type="radio" name="txt_user" value="student">student</td>







                        </tr>
                        <tr>
                            <td>Department</td>
                            <td><select name="txt_dept">
                                    <option value="">
                                        -------select------
                                    </option>
                                    <option value="COMPUTER SCIENCE">COMPUTER_SCIENCE</option>
                                    <option value="PHYSICS">PHYSICS</option>
                                    <option value="COMMERCE">COMMERCE</option>

                                </select></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><textarea name="txt_address"id="input"></textarea></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><input type="text" name="txt_city" value=""maxlength="30"id="input" />
                                (max 30 characters a-z and A-Z)
                            </td>
                        </tr>
                        <tr>
                            <td>Mobile number</td>
                            <td><input type="text" name="txt_mob" value=""maxlength="10" id="input"/>
                                (10 digit number)
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="txt_email" value=""maxlength="100" id="input"></td>
                        </tr>
                        <tr>
                            <td>User name</td>
                            <td><input type="text" name="txt_user" value=""id="input"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" name="txt_pass" value=""maxlength="32"id="input" /></td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td><input type="password" name="txt_cpass" value=""maxlength="32" id="input"/></td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>
                                <input type="submit" name="sub" value=""  style="background-image: url('image/images%20(2).jpg');width:125px;height:40px;" id="reg">
                            </td>
                        </tr>
                    </table>

                </form>
                <input type="button" name="login" value="login" onclick="location.href='loging.php'" id="log">

            </center>
        </div>

    </div>
</div>
<?php
include('footer.php');
?>



