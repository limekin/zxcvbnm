<?php
session_start();
$x=mysql_connect("localhost","root","");
mysql_select_db("opencourse");


$query = mysql_query("SELECT * FROM course ");

// set array
$login_id=1;
$subject = array();
$count=1;



// look through query
while($row = mysql_fetch_assoc($query)){

// add each row returned into an array

    $subject[$row['id']] = $row['name'];


// OR just echo the data:
 // etc
}
echo mysql_error($x);

if($_SERVER['REQUEST_METHOD']=="POST")
{

$j=$_SESSION['count'];
    echo $j;

if(isset($_POST['sub']))
{

while($j>0)
{

    $subid=$_POST[$j];
    $query2= "insert into allotter(login_id,subject_id,pref) values ('".$login_id."','".$subid."','".$j."' )";
    if(mysql_query($query2))
    {

        echo "success";
        echo $j;
    }
    else{
       echo mysql_error($x);

    }

$j--;
}



}

}



?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Basic Form</title>


    <link rel="stylesheet" href="assets/form-basic.css">

</head>


<body>

<div class="main-content">

    <!-- You only need this form and the form-basic.css -->

    <form class="form-basic" method="post" action="#">

        <div class="form-title-row">
            <h1>Choose Preference</h1>
        </div>

        <?php

        foreach($subject as $i=>$sub ){

            ?>


        <div class="form-row">
            <label>
                <span>Preference <?php  echo $count ?></span>
<!--                <span>Subject</span>-->
                <select name="<?php echo $count ?>">
                    <option>Option One</option>
                  <?php


                foreach($subject as $index=>$id ){
                      ?>
                      <option value="<?php echo $index; ?>"><?php echo $id; ?></option>
                  <?php

                  }
                  ?>

                </select>
            </label>
        </div>


<?php
            $count++;




}
        $_SESSION['count']=$count-1;

        ?>

        <div class="form-row">
            <button type="submit" name="sub">Submit Form</button>
        </div>

    </form>

</div>

</body>

</html>
