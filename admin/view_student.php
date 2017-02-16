<?php
session_start();
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
?>
<?php require("header.php") ?>
<style>

    table a:link {
        color: #ffffff;
        font-size: 20px;
        font-weight: bold;
        text-decoration:none;
    }
    table a:visited {
        color: #999999;
        font-weight:bold;
        text-decoration:none;
    }
    table a:active,
    table a:hover {
        color: #bd5a35;
        text-decoration:underline;
    }
    table a#a:hover
    {
        color: #008000;
        text-decoration:underline;
    }
    table {

        width: 70%;
        font-family:Arial, Helvetica, sans-serif;
        color:#ffffff;
        font-size:16px;

        background:transparent;
        margin:20px;
        border:#ccc 1px solid;

        -moz-border-radius:3px;
        -webkit-border-radius:3px;
        border-radius:3px;

    }
    table th {
        padding:20px 25px 22px 25px;
        text-align: center;


        background: transparent;
    }

    table th:first-child{
        text-align: left;
        padding-left:20px;
    }
    table tr:first-child th:first-child{
        -moz-border-radius-topleft:3px;
        -webkit-border-top-left-radius:3px;
        border-top-left-radius:3px;
    }
    table tr:first-child th:last-child{
        -moz-border-radius-topright:3px;
        -webkit-border-top-right-radius:3px;
        border-top-right-radius:3px;
    }
    table tr{
        text-align: center;

    }

    table tr td:first-child{
        text-align: center;
        padding-left:20px;
        border-left: 0;
    }
    table tr td {
        padding:18px;
        border-top: 1px solid #ffffff;
        border-bottom:1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;

        background: transparent;

    }
    table tr.even td{
        background: transparent;
    }
    table tr:last-child td{
        border-bottom:0;
    }
    table tr:last-child td:first-child{
        -moz-border-radius-bottomleft:3px;
        -webkit-border-bottom-left-radius:3px;
        border-bottom-left-radius:3px;
    }
    table tr:last-child td:last-child{
        -moz-border-radius-bottomright:3px;
        -webkit-border-bottom-right-radius:3px;
        border-bottom-right-radius:3px;
    }
    table tr:hover td{
        background: transparent;
    }
    #h2{font-size:14px; font-weight:bold; font-weight:300;text-align: center;  color:#4e4e4e; padding:29px 0 27px 0; line-height:38px;}

    .row{


        margin-left: 170px;
    }



</style>
<?php
$query="select login.id as l,username,im_users.name as nam,dob,image,gender,address,email,mobile,im_class.name as sem,course.name as cou from login,im_users,student,course,im_class where login.id=im_users.login_id and login.id=student.user_id and course.id=student.preffered_course_id and im_class.class_id=student.class";
$s=mysql_query($query);
if(mysql_num_rows($s)!=0)
{
    ?>

    <section class="our-contacts" id="contact">
        <h3 class="text-center slideanim" >VIEW STUDENTS</h3>

<table class='table table-bordered text-center' border="l" align="center">
    <tr>
        <th >image</th>
        <th >reg no</th>
        <th >name</th>
        <th >course</th>
        <th >class</th>
        <th >view</th>

    </tr>
    <?php
    while($p=mysql_fetch_array($s))
    {
      ?>
    <tr>
        <td>
            <img src="images/<?php echo $p['image'];?>"height="100 px" width="150px"/>
        </td>

        <td>
            <?php echo $p['username'];?>
        </td>
        <td>
            <?php echo $p['nam'];?>
        </td>
        <td>
            <?php echo $p['cou'];?>
        </td>
        <td>
            <?php echo $p['sem'];?>

        </td>
        <td>
            <a href="student_full.php?id=<?php echo $p['l']?>" class="glyphicon glyphicon-chevron-right">view</a>

        </td>
    </tr>
    <?php

    }

    ?>
</table>
    </section>


<?php

}
else{
    echo "<div class='alert alert-danger text-center'>NO STUDENTS......</div>";

}

?>
<?php require("footer.php") ?>