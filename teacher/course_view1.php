<?php
session_start();
$s=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
$teachId = $_SESSION['tid'];

//if(!isset($_REQUEST['tid']))
//{
//    header('location:course_view1.php');
//    exit;
//}
//$id=$_REQUEST['tid'];
require("header.php");?>


    <style>
    .bold{
        font-weight:bold;color:#000000;
    }
</style>
<?php
$query="select distinct name from course inner join im_teacher where course.dept=im_teacher.dept and im_teacher.teacherid=$teachId";
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
                          echo $p['name'];
                            ?></h3>
                        <div class="agileinfo_banner_bottom_right1_grid">
                            <table class='table table-bordered text-center'border="1" align="center">


                                <tr>
                                    <td class="bold">course</td>

                                    <td>
                                        <?php echo $p['name'];?>
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
