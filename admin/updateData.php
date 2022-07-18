<?php
include('../database.php');
error_reporting(0);
$fname= $_GET['fname'];
$id= $_GET['id'];
$lname= $_GET['lname'];
$email= $_GET['email'];
$address= $_GET['address'];
$mobileno= $_GET['mobileno'];



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
	 <!---<li class="nav-item">
      <a class="nav-link" href="status.php">Status</a>
    </li>---->
    <li class="nav-item">
      <a class="nav-link" href="payment.php">Payment</a>
    </li>
	
  </ul>

</nav>
</div>	
<div class="col-md-10 col-lg-10 roominfo">
<div class="row">
<h1 class="info">Update  Information</h1><hr class="line" ALIGN="center" WIDTH="40%" COLOR="#116446">
</div>
<div class="row">
<form  class="form-inline form" action="updateData.php" method="post">
<div class="rn">
<span class="label">ID</span>
<input type="text" name="id" value="<?php echo "$id" ?>"><br>
<span class="label">First Name</span>
<input type="text" name="name" value="<?php echo "$fname" ?>"><br>
<span class="label">Last Name</span>
<input type="text" name="lname" value="<?php echo "$lname" ?>"><br>
<span class="label">Email</span>
<input type="text" name="email" value="<?php echo "$email" ?>"><br>
<span class="label">Address</span>
<input type="text" name="address" value="<?php echo "$address" ?>"><br>
<span class="label">Mobile No.</span>
<input type="text" name="mobileno" value="<?php echo "$mobileno" ?>"><br>


<button type="submit" class="btn btn-primary  "name="submit" >update</button>
</div>
</div>

	
</form>


<?php
include('../database.php');
error_reporting(0);

if(isset($_POST['submit'])){
    $id = $_POST['id'];

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobileno = $_POST['mobileno'];

    $query="UPDATE room SET firstname='$name',lastname='$lname',email='$email',address='$address',mobileno='$mobileno' WHERE id='$id'";
   // echo($query);
    $data=mysqli_query($con,$query);

    if($data){
        echo "<script>alert('Record updtaed')</script>";

    }
    else{
         echo "<script>alert('failed Record updtaed')</script>";


    }

}
?>