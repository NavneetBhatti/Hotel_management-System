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
	<!--- <li class="nav-item">
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
<h1 class="info">Payment Details</h1>
</div>
<div class="row">
<form  class="form-inline form" action="payment.php" method="post">
<div class="rn">
<span class="label">Search the Name</span>
<input type="text" name="name">
<button type="submit" class="btn btn-primary" name="submit" >view info</button>
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
	$name=$_POST['name'];
$query="SELECT * FROM room WHERE CONCAT( firstname,  ' ', lastname ) LIKE  '%$name%'";





$data=mysqli_query($con,$query);
$total=mysqli_num_rows($data);

	
if($total!=0){
	?>
	<div class="row">
<div class="col-md-10 mx-auto">

	<table class="table  tab table-warning table-bordered">
	<thead>
	<tr>
	<th scope="col">Name</td>
	<th scope="col">Room Type</td>
	<th scope="col">Bed Type</td>
	<th scope="col">Check In</td>
	<th scope="col">Check Out</td>
	<th scope="col">No of Rooms</td>
	<th scope="col">Meal Type</td>
	<th scope="col">Room Rent</td>
	<th scope="col">Bed Rent</td>
	<th scope="col">Meals</td>
	<th scope="col">Total</td>
	<!--<th scope="col">Gr. Total</td>--->
	<!--<th scope="col">Print</td>-->
	</tr>
	</thead>
	<?php
	while($result=mysqli_fetch_assoc($data))
	{
		
		echo"<tbody>
		<tr>
		<td>".$result['firstname']." ".$result['lastname']."</td>
		<td>".$result['typeofroom']."</td>
		<td>".$result['beddingtype']."</td>
		<td>".$result['checkin']."</td>
		<td>".$result['checkout']."</td>
		<td>".$result['noofrooms']."</td>
		<td>".$result['mealplan']."</td>
		<td>".$result['rent']."</td>
		<td>".$result['bedrent']."</td>
		<td>".$result['mealprice']."</td>
		<td>".$result['total']."</td>";
		
		
		
		
	
	 
		echo"		</tr>
		</tbody>";
		$result= mysql_query("SELECT SUM(orders) AS totalsum FROM room where name='$name'");

$row = mysql_fetch_assoc($result); 

$sum = $row['totalsum'];

echo ("This is the sum: $sum");

	}
}

else{
	echo"no records";
}
}
?>
</table>
</div>
</div>
</div>
</div>
</div>


