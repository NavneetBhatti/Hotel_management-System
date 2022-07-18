<?php
include('../database.php');
error_reporting(0);
$id= $_GET['id'];
$query="DELETE FROM room WHERE id= '$id'";
$data=mysqli_query($con,$query);
if($data){
    echo "<script>alert('Record deleted')</script>";
    header("location:adminDash.php"); // redirects to all records page


}
else{
    echo "<script>alert('failed Record deletion')</script>";


}



?>
