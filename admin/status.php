<?php
session_start();
include('../database.php');
?>
<html lang="en">
<head>
  <title>Seascape</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="adminDash.css">
 
   </head> 
	<body>
	 <!-- Navigation -->
  
<nav class="navbar navbar-expand-lg navbar-light text-white navbar-inverse sticky-top nav ">
<div class="container-fluid">
<a class="navbar-brand js-scroll-trigger logo " href="adminDash.php"><strong class="ad">Admin Dashboard</strong></a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger  font" href="adminLogout.php">Logout</a>
            </li>
			</ul>
        </div></div>
</nav>
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-2 col-lg-2 dashboard">
	<!-- A vertical navbar -->
<nav class="navbar bg-light verNav">

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="adminDash.php">Room Information</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="bookedRooms.php">Booked Rooms</a>
    </li>
	 <li class="nav-item">
      <a class="nav-link" href="status.php">Status</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="payment.php">Payment</a>
    </li>
  </ul>
</nav>
</div>	
<div class="col-md-10 col-lg-10 roominfo">
<div class="row">
<h1 class="info"></h1>
</div>

<div class="container status">
  <table class="table">
    <thead>
      <tr>
        <td  align="center"><h4>Room No.</h4></td>
        <td><input type="text" class="input" name="rn"></td>
      
      </tr>
    </thead>
    <tbody>
      <tr>
        <td  align="center"><h4>Status:</h4></td>
        <td>
		<form action="status.php"  method="post">
 <label class="radio-inline font">
      <input type="radio" id="q156" name="status" value="vacant" >vacant
  </label>
    <label class="radio-inline font">
      <input type="radio"id="q156" name="status" value="occupied">occupied
    </label>
   </form>
		</td>
      </tr>
      <tr>
        <td align="center"><button type="submit" class="btn btn-danger "name="submit" >Submit</button></td>
        <td align="center"><button type="submit" class="btn btn-danger "name="check" >Check status</button></td>
        
      </tr>
      
    </tbody>
  </table>
</div>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  
</body>
</html>

<?php

if(isset($_POST['submit']))
{

$con=mysqli_connect('localhost','root','','hms');
if($con){
	echo"connect";
}

	
    $status=$_POST['status'];
    $rn=$_POST['rn'];
                                  
									if($status=="vacant")
									{
										$status="vacant";
									
									}
									else if($type=="occupied")
									{
										$status="occupied";
									}
//$qry="INSERT INTO `room`(`status`) VALUES ('$status')";
//$qry="UPDATE `room` SET `firstname`="h",`lastname`="hk",`email`="jj",`address`="jjm"WHERE id="$rn"";
            $sql = "UPDATE room ". "SET firstname = emp ". 
               "WHERE id = $rn" ;
             
 $run=mysqli_query($con,$sql);
 if($run==true)
 {
 ?>
 <script>
 alert(" Congrats! Your Room ia booked");
 window.open('status.php','_self');
 </script>
 <?php
 }
else{echo" hjhjhjjh";}
}
 ?>