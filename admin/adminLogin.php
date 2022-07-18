<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['uid']))
{
    header('location:adminDash.php');
}


?>
<html lang="en">
<head>
  <title>Seascape</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="adminLogin.css">
    
	<body>
	<a href="../index.php"><button type="button" class="btn btn-danger"name="button" >Go to Homepage</button></a>

	<div class="col-12 ">
 <strong><h1 class="room text-center mt-6">Admin Login</h1></strong>
 <hr class="light my-2">
 </div>
  <div class="container margin">
  <div class="row">
  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card bg">
		<!--<div class="card-header"><h3>Admin Login</h3></div>-->
          <div class="card-body">
		  <form action="adminLogin.php" method="post">
  <div class="form-group">
    <label for="username">username:</label>
    <input type="text" class="form-control" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name="password">
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-danger"name="submit" >Submit</button>
</form>

  
  </div>
  </div>
  </div>
  </div>
  </div>
  


 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  
</body>
</html>

<?php
include('../database.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
 $qry="SELECT * FROM admin WHERE username='$username' AND password='$password'";
 $run=mysqli_query($con,$qry);
 $row=mysqli_num_rows($run);        
         if($row<1)
         {
         ?>   
             <script>
             alert('username or password is wrong');
            window.open('adminLogin.php','_self');
             </script>
             <?php
         }
         else{
             $data=mysqli_fetch_assoc($run);
             $id=$data['id'];
            // echo"id".$id;
             $_SESSION['uid']=$id;
             header('location:adminDash.php');
             }
}
?>