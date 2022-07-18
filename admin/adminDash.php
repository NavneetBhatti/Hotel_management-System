<?php
session_start();

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
<h1 class="info">Rooms Information</h1><hr class="line" ALIGN="center" WIDTH="40%" COLOR="#116446">
</div>
<div class="row">
<form  class="form-inline form" action="adminDash.php" method="post">
<div class="rn">
<span class="label">Enter the Room No.</span>
<input type="text" name="id">
<button type="submit" class="btn btn-primary  "name="submit" >view info</button>
</div>
</div>

	
</form>




	
	
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
    <script src="../bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  
</body>
</html>
 
<?php
include('../database.php');
error_reporting(0);

if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$query="SELECT * FROM room WHERE id='$id'";
$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);

	
if($total!=0){
	?>
	<div class="row">
<div class="col-md-6 mx-auto">

	<table class="table  tab  table-warning ">
	
	<?php
	while($result=mysqli_fetch_assoc($data))
	{


		echo"<tbody>
		<tr>
		<th><button ><a href='updateData.php?id=$result[id] &fname=$result[firstname] &lname=$result[lastname] &email=$result[email] &address=$result[address] &mobileno=$result[mobileno]'>Update</a></button></th>
		<th><button ><a href='delete.php?id=$result[id]'>Delete</a><button></th>
        </tr>
		<tr>
		<th>ID</th>
		<td>".$result['id']."</td>
        </tr>
		<tr>
		<th>Name</th>
		<td>".$result['firstname']." ".$result['lastname']."</td>
		</tr>
		<tr>
		<th>Email</th>
		<td>".$result['email']."</td>
		</tr>
		
		<tr>
		<th>Address</th>
		<td>".$result['address']."</td>
		</tr><tr>
		<th>MobileNO</th>
		<td>".$result['mobileno']."</td>
		</tr>
		<tr>
		<th>Nationality</th>
		<td>".$result['nationality']."</td>
		</tr><tr>
		<th>Room Type</th>
		<td>".$result['typeofroom']."</td>
		</tr><tr>
		<th>Bedding Type</th>
		<td>".$result['beddingtype']."</td>
		</tr><tr>
		<th>Meal</th>
		<td>".$result['mealplan']."</td>
		</tr><tr>
		<th>No Of Rooms</th>
		<td>".$result['noofrooms']."</td>
		</tr>
		<tr>
		<th>Check In</th>
		<td>".$result['checkin']."</td>
		</tr><tr>
		<th>Check Out</th>
		<td>".$result['checkout']."</td>
		</tr>
		</tbody>";
	}
}
else{
	echo"no record found";
}
}
?>
</table>
</div>
</div>
</div>
</div>
</div>
