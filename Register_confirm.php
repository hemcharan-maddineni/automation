<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>PAS-REGISTER</title>
  <meta name="description" content="free website template" />
  <meta name="keywords" content="enter your keywords here" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.easing.min.js"></script>
  <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
	
  </script> 
</head>

<body>
  <div id="main">
	
	<div id="menubar">
	  <div id="welcome">
	    <h1><a href="#">FastPort Passport</a></h1>
	  </div><!--close welcome-->
      <div id="menu_items">
	    <ul id="menu">
          <li><a href="Home.html">Home</a></li>
		  <li class="current"><a href="Register.html">Register</a></li>
          <li><a href="Login.html">Login</a></li>
        </ul>
      </div><!--close menu-->
    </div><!--close menubar-->	
	
	<div id="site_content">	

	  <div id="banner_image">
	    <div id="slider-wrapper">        
          <div id="slider" class="nivoSlider">
            <img src="images/home_1.jpg" alt="" />
            <img src="images/home_2.jpg" alt="" />
		  </div><!--close slider-->
		</div><!--close slider_wrapper-->
	  </div><!--close banner_image-->	

	  <div class="sidebar_container">       
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>New Website</h2>
            <p>Welcome to our new website. Please have a look around, any feedback is much appreciated.</p>
          </div><!--close sidebar_item--> 
        </div><!--close sidebar-->     		
		<div class="sidebar">
          <div class="sidebar_item">
            <h2>Latest Update</h2>
            <h3>August 2016</h3>
            <p>Four ID proofs (Aadhaar, PAN, EPIC, Affidavit in format of Annexure-I) can get you a passport in 7 days.</p>         
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
		  		
      </div><!--close sidebar_container-->		   
	   
      <div id="content">
        <div class="content_item">
		  <div class="form_settings">
            <h2>Register</h2>
<?php
session_start();
$database="PAS"; 
$name=$_POST['Name'];
$email=$_POST['Email'];
$id=$_POST['userID'];
$pd=$_POST['pwd'];
$_SESSION['userID']=$id;
    $con = mysqli_connect("localhost","root" ,"",$database);
    if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
    

$query = "INSERT INTO login_details (Name,Designation,EMail,UserID,Pwd)VALUES ('$name','A','$email','$id','$pd')";
mysqli_query($con,$query);

echo "<script type='text/javascript'>\n";
echo "alert('you are Succesfully registered');\n";
echo "</script>";

echo '<a href="ApplicantHome.html"><br>Click here </a>';
echo " to proceed to the website.";
mysqli_close($con);
?>
          </div><!--close form_settings-->
		</div><!--close content_item-->
      </div><!--close content-->   

	  
  
    	
  
</body>
</html>
