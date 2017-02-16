<html>
<body>
<?php
session_start();
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");
include("header.php");

?>
<?php
$cou= $_POST['course'];
$sub=$_POST['subject'];
$exam=$_POST['name'];
$q="insert into mark(exam_name,user_id) values()";
$suc = mysql_query($q);
?>
<section class="our-contacts" id="contact">
    <h3 class="text-center slideanim">ADD MARK</h3>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <form action="#" method="post" name="frm" id="frm" enctype="multipart/form-data">

                        <div class="form-group col-lg-6 slideanim">
                            <select name="course" class="form-control user-name">
                                <option value="">COURSE</option>
                                <?php
                                echo $query = "select * from course";
                                $s = mysql_query($query);
                                while ($e = mysql_fetch_array($s)) {
                                    echo "<option value='" . $e["id"] . "'>" . $e["name"] . "</option>";

                                }
                                ?>
                            </select>

                        </div>


                        <div class="form-group col-lg-6 slideanim">
                            <select name="class" class="form-control user-name">
                                <option value="">subject</option>
                                <?php
                                echo $query = "select * from im_class";
                                $s = mysql_query($query);
                                while ($e = mysql_fetch_array($s)) {
                                    echo "<option value='" . $e["class_id"] . "'>" . $e["name"] . "</option>";

                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 slideanim">
                            <input type="text" name="name" class="form-control user-name" placeholder="EXAM NAME" required/>
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


</body>
<?php
include("footer.php");
?>
</html>