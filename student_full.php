<?php
session_start();
$s=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
if(!isset($_REQUEST['id']))
{
    header('location:view_student.php');
    exit;
}
$id=$_REQUEST['id'];
// require("header.php");?>
<style>
.bold{
    font-weight:bold;color:#000000;
}
    </style>
<?php
$query="select login.id as l,username,im_users.name as nam,dob,image,gender,address,email,mobile,im_class.name as sem,course.name as cou from login,im_users,student,course,im_class where login.id=im_users.login_id and login.id=student.user_id and course.id=student.preffered_course_id and im_class.class_id=student.class and login_id='$id'";
$s=mysql_query($query);
if(mysql_num_rows($s)!=0)
{
    while($p=mysql_fetch_array($s))
    {
        ?>
<div class="banner-bottom">
    <div class="container">
        <div class="col-md-12 agileinfo_banner_bottom_right">
            <div class="agileinfo_banner_bottom_right1">
                <h3><?php
                echo $p['nam'];
                    ?></h3>
                <div class="agileinfo_banner_bottom_right1_grid">
                    <table class='table table-bordered text-center'border="1" align="center">
                        <tr>
                            <td colspan="2">
                                <img src="images/<?php echo $p['image'];?>" height="50%"width="50%"/>

                            </td>
                        </tr>
                        <tr>
                            <td class="bold">reg no</td>

                            <td>
                                <?php echo $p['username'];?>
                            </td>
                            </tr>
                        <tr>
                            <td class="bold">course</td>

                            <td>
                                <?php echo $p['cou'];?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">class</td>

                            <td>
                                <?php echo $p['sem'];?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">DOB</td>

                            <td>
                                <?php echo $p['dob'];?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">gender</td>

                            <td>
                                <?php echo $p['gender'];?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">Address</td>

                            <td>
                                <?php echo $p['address'];?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">email</td>

                            <td>
                                <?php echo $p['email'];?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bold">Mobile</td>

                            <td>
                                <?php echo $p['mobile'];?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="view_student.php"class="glyphicon glyphicon-backward">back</a>
                            </td>
                        </tr>
                    </table>
        </div>
    </div>
</div>
<div class="clearfix"></div>
        </div>
    </div>
<?php
    }
}
else{
    header("location:view_student.php");
}