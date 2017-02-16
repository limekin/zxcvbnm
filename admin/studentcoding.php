<?php
$x=mysql_connect("localhost:3307","root","");
mysql_select_db("opencourse");
error_reporting(E_ALL^E_NOTICE)
?>
<?php
$err="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(count($_POST)>0)
    {
        $user=$_POST['users_id'];
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
    }
    if(count($_POST)>0)
    {
        foreach($_POST as $key=>$value)
        {
            if(empty($_POST[$key]))
            {
                $message=ucwords($key)."Field is required";
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
    //var_dump($_POST);
    if($err!='1')
    {
        $reg=$_POST['users_id'];
        $nam=$_POST['name'];
        $gnd=$_POST['gender'];
        $dob=$_POST['dob'];
        $add=$_POST['address'];
        $email=$_POST['email'];
        $image=$_FILES["images 2"]["name"];
        $mob=$_POST['mobile'];
        ?>
        <?php
        $d="select * from login where username='$reg'";
        $e=mysql_query($d);
        $temp=mysql_fetch_array($e);
        if($temp)
        {
            echo "<div class='error';>REGISTRATION NUMBER ALREADY EXITS!!!</div>";

        }
        else
        {
            if($_FILES["images 2"]["error"]>0)
            {
                echo $_FILES["images 2"]["error"];

            }
            elseif(file_exists("images 2/".$_FILES["images 2"]["name"]))
            {
                echo "<div class='error';>TAKE OTHER IMAGE</div>";

            }
            else
            {
                {
                    move_uploaded_file($_FILES["images 2"]["tmp_name"],"images 2/".$_FILES["images 2"]["name"]);
                    echo "<div class='saved';>IMAGE SAVED</div>";
                }
            }
        }

    }
}
    ?>


