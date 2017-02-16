<!DOCTYPE HTML>
<html>
<head>
    <title>Allied a corporate Category Flat Bootstrap Responsive  Website Template | Home :: w3layouts</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Allied  Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--Google Fonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <!--google fonts-->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

        $(function() {
            $("li").on("click",function() {

                var $this = $(this);
                $this.parent().siblings().removeClass('active').end().addClass('active');

            });
        });

    </script>
    <style>



        #login-dp{
            min-width: 250px;
            padding: 14px 14px 0;
            overflow:hidden;
            background-color:rgba(255,255,255,.8);
        }
        #login-dp .help-block{
            font-size:12px
        }
        #login-dp .bottom{
            background-color:rgba(255,255,255,.8);
            border-top:1px solid #ddd;
            clear:both;
            padding:14px;
        }
        #login-dp .social-buttons{
            margin:12px 0
        }
        #login-dp .social-buttons a{
            width: 49%;
        }
        #login-dp .form-group {
            margin-bottom: 10px;
        }
        .btn-fb{
            color: #fff;
            background-color:#3b5998;
        }
        .btn-fb:hover{
            color: #fff;
            background-color:#496ebc
        }
        .btn-tw{
            color: #fff;
            background-color:#55acee;
        }
        .btn-tw:hover{
            color: #fff;
            background-color:#59b5fa;
        }
        @media(max-width:768px){
            #login-dp{
                background-color: inherit;
                color: #fff;
            }
            #login-dp .bottom{
                background-color: inherit;
                border-top:0 none;
            }
        }



        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            height: 80%;
            margin: auto;
        }

    </style>
</head>
<body>

<!--header-top end here-->
<!--header start here-->
<!-- NAVBAR
    ================================================== -->



<?php

$x=mysqli_connect("localhost","root","root","employee");
$fnameErr=$lnameErr=$emailErr=$phoneErr=$genderErr=$unameErr=$passErr='';
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<?php
$err="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{


    if (empty($_POST["fname"])) {
        $fnameErr = "First Name is required";
        $err='1';
    } else {
        $fname = test_input($_POST["fname"]);


        }


    if (empty($_POST["uname"])) {
        $unameErr = "User Name is required";
        $err='1';
    }


    if (empty($_POST["pass"])) {
        $passErr = "Password is required";
        $err='1';
    }
    if (empty($_POST["lname"])) {
        $lnameErr = "Last Name is required";
        $err='1';
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $err='1';
    } else {
      $email = test_input($_POST["email"]);
    }

    if (empty($_POST["asp"])) {
        $genderErr = "Gender is required";
        $err='1';
    } else {
        $gnd = test_input($_POST["asp"]);
    }




  /*  if (empty($_POST["website"])) {
        $website = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $comment = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }

   */



    if(count($_POST)>0)
    {
        $user=$_POST['uname'];
        $mob=$_POST['phone'];
        $em=$_POST['email'];


        if ( !preg_match ("/^[a-zA-Z0-9]+$/",$user)) {
            $message = " Invalid username no space allowed";
            $err='1';
        }

         if ( !preg_match ("/^[0-9]{10}$/",$mob)) {
            $phoneErr = "Contact must only contain numbers!";
            $err='1';
        }
         if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "valid email needed!";
            $err='1';
        }


    }
 /*   if(count($_POST)>0) {

        foreach($_POST as $key=>$value) {
            if(empty($_POST[$key])) {
                $message = ucwords($key) . " field is required";
                $err='1';
                break;
            }
        }
    }*/




}


?>
<?php
if(isset($_POST['sub']))
{
    // var_dump($_POST);
    if($err!='1')
    {





        $add = $_POST['address'];
      //  $gnd=$_POST['asp'];
        $dob=$_POST['dob'];
        $nation = $_POST['nation'];
        $phone = $_POST['phone'];

        $qual=$_POST['qual'];
        $exp=$_POST['exp'];
        //$sal=$_POST['salary'];
        $emp=$_POST['job'];


        $uname=$_POST['uname'];
        $pass=$_POST['pass'];

        $d="select * from tb_login where username='$uname'";
        $e=mysqli_query($x,$d);

        $temp=mysqli_fetch_array($e);
        if($temp)
        {

            $unameErr="Username Already Exists!";

        }
            else
            {

                $qery="insert into tb_login(username,password,type,status)values('".$uname."','".$pass."','employee','0')";
                mysqli_query($x,$qery);
              /*  if(mysqli_query($x,$qery))


                {


                }
                else
                {

                    echo mysqli_error($x);
                }*/

               $log_id = mysqli_insert_id($x);
               // echo($log_id);
                $ins= "insert into tb_register(login_id,fname,lname,address,gender,dob,nationality,mobile,email,qualification,experience,emp_id) values ('".$log_id."','".$fname."','".$lname."','".$add."','".$gnd."','".$dob."','".$nation."','".$phone."','".$email."','".$qual."','".$exp."','".$emp."')";
                $suc = mysqli_query($x,$ins);
                if(mysqli_errno($x) != 0) {
                    echo mysqli_error($x);
                }
                if($suc)
                {
                    echo '<div class="alert alert-success">
  <strong>Success! </strong> Employee Registered successfully .
</div>

<div class="alert alert-info">
  <strong></strong> Wait for Admin Approval
</div>';
                }

            }


    }
    else
    {
        echo "<div  class='error1' >Error</div>";
    }


}


?>

<!DOCTYPE>
<html>
<head>

    <title>Registration</title>
    <style>
        .success {
            color:darkblue;text-align: center;font-size: 25px;font-family: sans-serif;
        }
        .saved {color: green;text-align: center;font-size: 25px;font-family: sans-serif;}

        .error1 {color: #FF0000;text-align: center;font-size: 25px;font-family: sans-serif;}

        .error {padding-left:180px; color: #FF0000;font-size: 11px;font-family: sans-serif;}
        .error2 {color: #FF0000;text-align: center;font-size: 11px;font-family: sans-serif;}

    </style>
    <link rel="stylesheet" href="css/form-basic.css">
</head>
<body>
<div class="wrapper">


    <form class="form-basic" method="post" action="#" enctype="multipart/form-data">

        <div class="form-title-row">
            <h1>Registration</h1>
        </div>

        <div class="form-row">
            <label>
                <span>First name</span>
                <input type="text" name="fname">
                <div class="error"><?php echo $fnameErr;?></div>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Last name</span>
                <input type="text" name="lname">
                <div class="error"><?php echo $lnameErr;?></div>
            </label>
        </div>



        <div class="form-row">
            <label>
                <span>Address</span>
                <textarea rows="4" cols="25" name="address"></textarea>


            </label>
        </div>

        <div class="form-row">
            <label><span>Gender</span></label>
            <div class="form-radio-buttons">

                <div>
                    <label>
                        <input type="radio" value="male" name="asp">
                        <span>Male</span>
                    </label>
                </div>

                <div>
                    <label>
                        <input type="radio" value="female" name="asp">
                        <span>Female</span>
                    </label>
                </div>


            </div>
            <div class="error"><?php echo $genderErr;?></div>
        </div>

        <div class="form-row">
            <label>
                <span>Date of birth</span>
                <input type="date" name="dob">
                <div class="error" ><?php ;?></div>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Nationality</span>
                <select name="nation">
                    <option value="">-- select one --</option>
                    <option value="indian">Indian</option>
                    <option value="afghan">Afghan</option>
                    <option value="albanian">Albanian</option>
                    <option value="algerian">Algerian</option>
                    <option value="american">American</option>
                    <option value="andorran">Andorran</option>
                    <option value="angolan">Angolan</option>
                    <option value="antiguans">Antiguans</option>
                    <option value="argentinean">Argentinean</option>
                    <option value="armenian">Armenian</option>
                    <option value="australian">Australian</option>
                    <option value="austrian">Austrian</option>
                    <option value="azerbaijani">Azerbaijani</option>
                    <option value="bahamian">Bahamian</option>
                    <option value="bahraini">Bahraini</option>
                    <option value="bangladeshi">Bangladeshi</option>
                    <option value="barbadian">Barbadian</option>
                    <option value="barbudans">Barbudans</option>
                    <option value="batswana">Batswana</option>
                    <option value="belarusian">Belarusian</option>
                    <option value="belgian">Belgian</option>
                    <option value="belizean">Belizean</option>
                    <option value="beninese">Beninese</option>
                    <option value="bhutanese">Bhutanese</option>
                    <option value="bolivian">Bolivian</option>
                    <option value="bosnian">Bosnian</option>
                    <option value="brazilian">Brazilian</option>
                    <option value="british">British</option>
                    <option value="bruneian">Bruneian</option>
                    <option value="bulgarian">Bulgarian</option>
                    <option value="burkinabe">Burkinabe</option>
                    <option value="burmese">Burmese</option>
                    <option value="burundian">Burundian</option>
                    <option value="cambodian">Cambodian</option>
                    <option value="cameroonian">Cameroonian</option>
                    <option value="canadian">Canadian</option>
                    <option value="cape verdean">Cape Verdean</option>
                    <option value="central african">Central African</option>
                    <option value="chadian">Chadian</option>
                    <option value="chilean">Chilean</option>
                    <option value="chinese">Chinese</option>
                    <option value="colombian">Colombian</option>
                    <option value="comoran">Comoran</option>
                    <option value="congolese">Congolese</option>
                    <option value="costa rican">Costa Rican</option>
                    <option value="croatian">Croatian</option>
                    <option value="cuban">Cuban</option>
                    <option value="cypriot">Cypriot</option>
                    <option value="czech">Czech</option>
                    <option value="danish">Danish</option>
                    <option value="djibouti">Djibouti</option>
                    <option value="dominican">Dominican</option>
                    <option value="dutch">Dutch</option>
                    <option value="east timorese">East Timorese</option>
                    <option value="ecuadorean">Ecuadorean</option>
                    <option value="egyptian">Egyptian</option>
                    <option value="emirian">Emirian</option>
                    <option value="equatorial guinean">Equatorial Guinean</option>
                    <option value="eritrean">Eritrean</option>
                    <option value="estonian">Estonian</option>
                    <option value="ethiopian">Ethiopian</option>
                    <option value="fijian">Fijian</option>
                    <option value="filipino">Filipino</option>
                    <option value="finnish">Finnish</option>
                    <option value="french">French</option>
                    <option value="gabonese">Gabonese</option>
                    <option value="gambian">Gambian</option>
                    <option value="georgian">Georgian</option>
                    <option value="german">German</option>
                    <option value="ghanaian">Ghanaian</option>
                    <option value="greek">Greek</option>
                    <option value="grenadian">Grenadian</option>
                    <option value="guatemalan">Guatemalan</option>
                    <option value="guinea-bissauan">Guinea-Bissauan</option>
                    <option value="guinean">Guinean</option>
                    <option value="guyanese">Guyanese</option>
                    <option value="haitian">Haitian</option>
                    <option value="herzegovinian">Herzegovinian</option>
                    <option value="honduran">Honduran</option>
                    <option value="hungarian">Hungarian</option>
                    <option value="icelander">Icelander</option>

                    <option value="indonesian">Indonesian</option>
                    <option value="iranian">Iranian</option>
                    <option value="iraqi">Iraqi</option>
                    <option value="irish">Irish</option>
                    <option value="israeli">Israeli</option>
                    <option value="italian">Italian</option>
                    <option value="ivorian">Ivorian</option>
                    <option value="jamaican">Jamaican</option>
                    <option value="japanese">Japanese</option>
                    <option value="jordanian">Jordanian</option>
                    <option value="kazakhstani">Kazakhstani</option>
                    <option value="kenyan">Kenyan</option>
                    <option value="kittian and nevisian">Kittian and Nevisian</option>
                    <option value="kuwaiti">Kuwaiti</option>
                    <option value="kyrgyz">Kyrgyz</option>
                    <option value="laotian">Laotian</option>
                    <option value="latvian">Latvian</option>
                    <option value="lebanese">Lebanese</option>
                    <option value="liberian">Liberian</option>
                    <option value="libyan">Libyan</option>
                    <option value="liechtensteiner">Liechtensteiner</option>
                    <option value="lithuanian">Lithuanian</option>
                    <option value="luxembourger">Luxembourger</option>
                    <option value="macedonian">Macedonian</option>
                    <option value="malagasy">Malagasy</option>
                    <option value="malawian">Malawian</option>
                    <option value="malaysian">Malaysian</option>
                    <option value="maldivan">Maldivan</option>
                    <option value="malian">Malian</option>
                    <option value="maltese">Maltese</option>
                    <option value="marshallese">Marshallese</option>
                    <option value="mauritanian">Mauritanian</option>
                    <option value="mauritian">Mauritian</option>
                    <option value="mexican">Mexican</option>
                    <option value="micronesian">Micronesian</option>
                    <option value="moldovan">Moldovan</option>
                    <option value="monacan">Monacan</option>
                    <option value="mongolian">Mongolian</option>
                    <option value="moroccan">Moroccan</option>
                    <option value="mosotho">Mosotho</option>
                    <option value="motswana">Motswana</option>
                    <option value="mozambican">Mozambican</option>
                    <option value="namibian">Namibian</option>
                    <option value="nauruan">Nauruan</option>
                    <option value="nepalese">Nepalese</option>
                    <option value="new zealander">New Zealander</option>
                    <option value="ni-vanuatu">Ni-Vanuatu</option>
                    <option value="nicaraguan">Nicaraguan</option>
                    <option value="nigerien">Nigerien</option>
                    <option value="north korean">North Korean</option>
                    <option value="northern irish">Northern Irish</option>
                    <option value="norwegian">Norwegian</option>
                    <option value="omani">Omani</option>
                    <option value="pakistani">Pakistani</option>
                    <option value="palauan">Palauan</option>
                    <option value="panamanian">Panamanian</option>
                    <option value="papua new guinean">Papua New Guinean</option>
                    <option value="paraguayan">Paraguayan</option>
                    <option value="peruvian">Peruvian</option>
                    <option value="polish">Polish</option>
                    <option value="portuguese">Portuguese</option>
                    <option value="qatari">Qatari</option>
                    <option value="romanian">Romanian</option>
                    <option value="russian">Russian</option>
                    <option value="rwandan">Rwandan</option>
                    <option value="saint lucian">Saint Lucian</option>
                    <option value="salvadoran">Salvadoran</option>
                    <option value="samoan">Samoan</option>
                    <option value="san marinese">San Marinese</option>
                    <option value="sao tomean">Sao Tomean</option>
                    <option value="saudi">Saudi</option>
                    <option value="scottish">Scottish</option>
                    <option value="senegalese">Senegalese</option>
                    <option value="serbian">Serbian</option>
                    <option value="seychellois">Seychellois</option>
                    <option value="sierra leonean">Sierra Leonean</option>
                    <option value="singaporean">Singaporean</option>
                    <option value="slovakian">Slovakian</option>
                    <option value="slovenian">Slovenian</option>
                    <option value="solomon islander">Solomon Islander</option>
                    <option value="somali">Somali</option>
                    <option value="south african">South African</option>
                    <option value="south korean">South Korean</option>
                    <option value="spanish">Spanish</option>
                    <option value="sri lankan">Sri Lankan</option>
                    <option value="sudanese">Sudanese</option>
                    <option value="surinamer">Surinamer</option>
                    <option value="swazi">Swazi</option>
                    <option value="swedish">Swedish</option>
                    <option value="swiss">Swiss</option>
                    <option value="syrian">Syrian</option>
                    <option value="taiwanese">Taiwanese</option>
                    <option value="tajik">Tajik</option>
                    <option value="tanzanian">Tanzanian</option>
                    <option value="thai">Thai</option>
                    <option value="togolese">Togolese</option>
                    <option value="tongan">Tongan</option>
                    <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                    <option value="tunisian">Tunisian</option>
                    <option value="turkish">Turkish</option>
                    <option value="tuvaluan">Tuvaluan</option>
                    <option value="ugandan">Ugandan</option>
                    <option value="ukrainian">Ukrainian</option>
                    <option value="uruguayan">Uruguayan</option>
                    <option value="uzbekistani">Uzbekistani</option>
                    <option value="venezuelan">Venezuelan</option>
                    <option value="vietnamese">Vietnamese</option>
                    <option value="welsh">Welsh</option>
                    <option value="yemenite">Yemenite</option>
                    <option value="zambian">Zambian</option>
                    <option value="zimbabwean">Zimbabwean</option>
                </select>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Phone Number</span>
                <input type="text" name="phone">
                <div class="error"><?php echo $phoneErr;?></div>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>E-mail</span>
                <input type="text" name="email">
                <div class="error"><?php echo $emailErr;?></div>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Qualification</span>
                <input type="text" name="qual">

            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Experience</span>
                <input type="text" name="exp">

            </label>
        </div>

        <div class="form-row">
            <label>
                <span>Position</span>
                <select name="job">

                    <option value="">--select--</option>

                    <?php

                    $select="select des_id,name from tb_designation where des_id>0";
                    $result=mysqli_query($x,$select);
                    while($a=mysqli_fetch_array($result))
                    {
                        unset($semesterid,$semester);
                        $name=$a['name'];
                        $empid=$a['des_id'];

                        echo '<option value="'.$empid.'">'.$name.'</option>';
                    }

                    ?>

                </select>
            </label>
        </div>

        <div class="form-row">
            <label>
                <span>User name</span>
                <input type="text" name="uname">
                <div class="error"><?php echo $unameErr;?></div>
            </label>
        </div>
        <div class="form-row">
            <label>
                <span>Password</span>
                <input type="text" name="pass">
                <div class="error"><?php echo $passErr;?></div>

            </label>
        </div>

        <div class="form-row">
            <button name="sub" type="submit">Submit</button>
        </div>

    </form>





</div>



</body>


</html>