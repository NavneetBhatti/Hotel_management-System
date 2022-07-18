<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seascape</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="roomRn.css">
    
	<body>
	<a href="../index.php"><button type="button" class="btn btn-danger"name="button" >Go to Homepage</button></a>
  <div class="container">
 <div class="row text-center">
 <div class="col-12 ">
 <strong><h1 class="room">Room Reservation</h1></strong>
 <hr class="light my-2">
 </div>
 </div>
 </div>

  <div class="container margin">
         <div class="row">
             <div class="col-12">
<form action="roomRn.php"  method="post">

<table cellpadding="10" width="40%" bgcolor="#d1e8e2" align="center"
cellspacing="2">
<tr>
<td colspan=2>
<center><font size=4><strong><h2 class="pi">Personal Information</h2></strong></font></center>
</td>
</tr>

<tr>
<td>First Name:</td>
<td><input type="text" name="fname"  size="30" class="input"></td>
</tr>
<tr>
<td>Last Name:</td>
<td><input type="text" name="lname"  size="30" class="input"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="email" name="email" class="input" size="30"></td>
</tr>

<tr>
<td>Address:</td>
<td><input type="text" name="address" class="input" size="30"></td>
</tr>
<tr>
<td>MobileNo:</td>
<td><input type="text" name="mobileNo"  size="30" class="input"></td>
</tr>
<tr>
<td>Nationality</td>
<td><input type="radio" name="nationality" value="indian" size="10">Indian
<input type="radio" name="nationality" value="nonIndian" size="10">Non Indian</td>
</tr>

<tr>
<td colspan=2>
<center><font size=4><strong><h2 class="pi">Reservation Information</h2></strong></font></center>
</td>
</tr>
<tr>
<td><label>Type of Room</label></td>
<td><select name="type" class="input select">
<option value="-1" selected>select..</option>
<option value="superior room">Superior</option>
<option value="deluxe room">Deluxe</option>
<option value="guest house">GuestHouse</option>
<option value="single room">Single</option>
</select></td>
</tr>
<tr>
<td><label>Bedding Type</label></td>
<td><select name="bedding" class="input select">
<option value="-1" selected>select..</option>
<option value="single">Single</option>
<option value="double">Double
<option value="triple">Triple</option>
<option value="quad">Quad</option>
</select></td>
</tr>
<tr>
<td><label>Meal Plan</label></td>
<td><select name="meal" class="input select">
<option value="-1" selected>select..</option>
<option value="roomOnly">Room Only</option>
<option value="breakfast">Breakfast</option>
<option value="halfboard">Half Board</option>
<option value="fullboard">Full Board</option>
</select></td>
</tr>
<tr>
<td><label>No. of rooms:</label></td>
<td><input type="text" name="number"  size="30" class="input select"></td>
</tr>
<tr>
<td><label>Check In:</label></td>
<td><input type="date" name="checkIn"   class="input select"></td>
</tr>

<tr>
<td><label>Check Out:</label></td>
<td><input type="date" name="checkOut"   class="input select"></td>
</tr>

<tr>
<td colspan="2"><button type="submit" class="btn btn-danger"name="submit" >Submit</button></td>
</tr>

</table>
</form>	  
</div>
</div>
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

	#include('../database.php');
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $mobileNo=$_POST['mobileNo'];
    $email=$_POST['email'];
  $nationality=$_POST['nationality'];
  $type =$_POST['type'];
  $bedding =$_POST['bedding'];
  $meal =$_POST['meal'];
  $number =$_POST['number'];
  $checkIn =$_POST['checkIn'];
  $checkOut =$_POST['checkOut'];
  $fullname=$fname.$lname;
  //roomrent..................................................................
                                  $rent=0;
									if($type=="superior room")
									{
										$rent = 1000;
									
									}
									else if($type=="deluxe room")
									{
										$rent = 800;
									}
									else if($type=="guest house")
									{
										$rent = 500;
									}
									else if($type=="single room")
									{
										$rent = 350;
									}
									
	//bed rent.....................................................................
                                     if($bedding=="single")
									{
										$bedrent = $rent * 1/100;
									}
									else if($bedding=="double")
									{
										$bedrent = $rent* 2/100;
									}
									else if($bedding=="triple")
									{
										$bedrent= $rent* 3/100;
									}
									else if($bedding=="quad")
									{
										$bedrent = $rent* 4/100;
									}
	//meal.................................................................
                                   if($meal=="roomOnly")
									{
										$mealprice=0;
									}
									else if($meal=="breakfast")
									{
										$mealprice=200;
									}else if($meal=="halfboard")
									{
										$mealprice=600;
									
									}else if($meal=="fullboard")
									{
										$mealprice=800;
									
									}
//no of days.....................................................									
$date1=date_create("$checkIn");
$date2=date_create("$checkOut");
$diff=date_diff($date1,$date2);
$noofdays=$diff->format("%R%a days");

//total....................................................................................
$total=$noofdays*$number*($rent+$bedrent+$mealprice);

									
$qry="INSERT INTO `room`( `firstname`, `lastname`, `email`, `address`, `mobileno`,`nationality`, `typeofroom`, `beddingtype`, `mealplan`, `noofrooms`, `checkin`, `checkout`, `rent`, `bedrent`, `mealprice`, `total`) VALUES ('$fname','$lname','$email','$address','$mobileNo','$nationality','$type','$bedding','$meal','$number','$checkIn','$checkOut','$rent','$bedrent','$mealprice','$total')";
 $run=mysqli_query($con,$qry);
 if($run==true)
 {
 ?>
 <script>
 alert(" Congrats! Your Room ia booked");
 window.open('roomRn.php','_self');
 </script>
 <?php
 }
else{echo" ";}}
 ?>