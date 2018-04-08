<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <title>APT DATE</title>
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
         <li><a href="ApplicantHome.html">Home</a></li>
		  <li><a href="ApplicationForm.html">Application</a></li>
          <li><a href="StatusCheck.html">Status</a></li>
          <li class="current"><a href="AppointmentAvail.php">Apt Date</a></li>
		  <li><a href="Payment.html">Payment</a></li>
		  <li><a href="Logout.html">Logout</a></li>
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
            <p>Four ID proofs ( Aadhaar, PAN, EPIC, Affidavit in format of Annexure-I) can get you a passport in 7 days.</p>         
		  </div><!--close sidebar_item--> 
        </div><!--close sidebar-->
		  		
      </div><!--close sidebar_container-->		   
	   
      <div id="content">
        <div class="content_item">
		  <div class="form_settings">
            <h2>Appointment Date </h2>
            <?php
			session_start();
	$database="PAS"; 
	$con = mysqli_connect("localhost","root" ,"",$database);
    if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
    $ApplicationNo=$_POST['ApplicationNo'];
	$id=$_SESSION['userID'];
	$query="SELECT ApplicationNo FROM applicant WHERE UserID='".$id."' LIMIT 2;";
	$res=mysqli_query($con,$query);
	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
	$AppNo=$row['ApplicationNo'];
	if($ApplicationNo<>$AppNo)
	{
		echo "Invalid Application Number! ";
		exit();
	}
	$AptDate=$_POST['AptDate'];
	$count=0;
	$query1="SELECT Status FROM applicant WHERE ApplicationNo='".$ApplicationNo."' LIMIT 2;";
	$res1=mysqli_query($con,$query1);
	$row=mysqli_fetch_array($res1,MYSQLI_ASSOC);
	$Status=$row['Status'];
	if($Status<>'R')
	{
		echo "Verification of documents by the Regional Administrator is not complete yet.";
		echo "<br>";
		echo "Come back after your application status changes to 'R'.";
	}
	else
	{
		
		
			$query="INSERT INTO policeverify(ApplicationNo,AptDate) VALUES('$ApplicationNo','$AptDate');";
			if(mysqli_query($con,$query))
			{
				echo "Appointment Date was chosen successfully.";
			}
			else
			{
				echo "Some error occurred during the process.";
			}
			
		
	}
	exit();
mysqli_close($con);
?>
          </div><!--close form_settings-->
		</div><!--close content_item-->
      </div><!--close content-->   

	  
  
    	
  
</body>
</html>
