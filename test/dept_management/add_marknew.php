


<?php

$con=mysqli_connect("localhost","root","")or die("error in connection");
//include("session.php");

?>

<html>
<head>
    <script>
        // Load the courses form the database.
        function loadCourses(languageSelect) {
            var selectedLanguage = languageSelect.value;
            //alert(selectedLanguage);
            console.log(selectedLanguage);

            var request = new XMLHttpRequest();
            var branchId = document.getElementById('subject').value;
            var url = "ajax.php?";
            url += "course=" + selectedLanguage;

            request.onreadystatechange = function(state) {
                if(request.readyState == 4) {
                    console.log("subject");
                    console.log(request.responseText);
                    updateCourses(request.responseText);
                }
            }
            request.open("GET", url, true);
            request.send();
        }

        // Updates the courses.
        function updateCourses(courses) {
            var courseList = document.getElementById('subject');
            courseList.innerHTML = courses;

        }
    </script>


</head>



<body>

<table  align="center" style="padding-left:100px ">

<!--    --><?php //include("menu.php");
$selected=1;
    @$cat=$_GET['cat']; // Use this line or below line if register_global is off
    if(strlen($cat) > 0 and !is_numeric($cat)){ // to check if $cat is numeric data or not.
        echo "Data Error";
        exit;
    }


    if(isset($_REQUEST['cat'])and strlen($cat)>0 )
    {
        $selected=$_REQUEST['cat'];

    }
        ?>


</table>



<h1><?php if(isset($_REQUEST['cat'])) echo $_REQUEST['cat'] ;?></h1>

<form name="f1" action="markform.php" method="post">


    <table align="center" style="width:800;height: 400px;padding-left: 200px">
        <tr>
            <td style="padding-left: 50px;padding-top: 50px " colspan="2">
                <h1> ADD MARK</h1>
            </td>
        </tr>




        <tr>
            <td>COURSE</td>
            <td>
                <select name="courseid"   id="course" onchange="loadCourses(this)">
                    <?php

                    $select="select id,name from courses where id>0";
                    $result=mysqli_query($con,$select);
                    while($a=mysqli_fetch_array($result))
                    {
                        unset($courseid,$coursename);
                        $coursename=$a['name'];
                        $courseid=$a['id'];
                        if($selected==$courseid)
                        {
                            $sel="selected";
                        }
                        else
                        {
                            $sel="";

                        }

                        echo  '<option '?><?php echo $sel ?><?php echo ' value="'.$courseid.'"">'.$coursename.'</option>';
                    }

                    ?>
                </select>
            </td>

        </tr>


        <tr>
            <td>

                SUBJECT
            </td>
            <td>
                <select name="subject" id="subject">




                    </select>

                               </td></tr><tr>

        <tr>

            <td> SEMESTER</td>
            <td> <select name="semester" value="semester"  >
                    <?php

                    $select="select id,name from semester where id>0";
                    $result=mysqli_query($con,$select);
                    while($a=mysqli_fetch_array($result))
                    {
                        unset($semesterid,$semester);
                        $semester=$a['name'];
                        $semesterid=$a['id'];

                        echo '<option value="'.$semesterid.'">'.$semester.'</option>';
                    }

                    ?>
                </select>

            </td>

        </tr>
            <td>

                <label>Exam name </label></td><td><input type="text" name="examname" >

            </td>
        </tr>



        <td>

            <table align="center">
                <tr >
                    <td style="padding-left: 50px">
                        <input  type="submit" name="sub" value="NEXT">
                    </td>

                </tr>


            </table>
        </td>
        </tr>
    </table>










</form>





</body>





</html>