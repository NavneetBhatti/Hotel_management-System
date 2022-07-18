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
	<!--- <li class="nav-item">
      <a class="nav-link" href="status.php">Status</a>
    </li>--->
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
<div class="row">
<form  class="form-inline form" action="adminDash.php" method="post">
<div class="rn">
<h3>Total no. of booked rooms : <?php $query="SELECT * FROM room";
	      $data=mysqli_query($con,$query);
		  $total=mysqli_num_rows($data);
		  echo $total;
	 ?></h3>
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

	?>
	<div class="row">
<div class="col-md-6 mx-auto">
	
	
	<?php
$result = mysqli_query($con,"SELECT * FROM room");
?>

<table class="table  tab  table-warning table-bordered">
<?php
echo"<tr>
<th>Room No.</th>
<th>Booked by</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['firstname']." ".$row['lastname'] . "</td>";
echo "</tr>";
}
?>
</table>





</div>
</div>
</div>
</div>
</div>
