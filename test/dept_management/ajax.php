<?php
include('config.php');
$cen_id=$_GET['course'];

$query="SELECT * FROM subjects WHERE course_id='".$cen_id."'";
$result1 = mysqli_query($con,$query);
?>
<option value="select">select </option>
<?php

while($a=mysqli_fetch_array($result1))
{
    unset($courseid,$coursename);
    $coursename=$a['name'];
    $courseid=$a['id'];

    echo '<option value="'.$courseid.'">'.$coursename.'</option>';
}
?>
