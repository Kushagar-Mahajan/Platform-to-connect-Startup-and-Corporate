<?php
session_start();
$action = Isset($_REQUEST['submit'])?$_REQUEST['submit']:"You Must Be Kidding!!!!!!";

if($action == 'Submit')
{


$email=$_POST['email'];
$pass=$_POST['password'];


$servername="localhost";
$username="root";
$password="";
$dbname="codepie";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql="SELECT * from account_table where email='$email' and password='$pass'";
$myqry=mysqli_query($conn, $sql);
$counter=mysqli_num_rows($myqry);
$res=mysqli_fetch_row($myqry);

if(($counter===1) && ($res[5]=="a"))
{
  $_SESSION['userid']=$res[0];
header("location:admin.php");
}
elseif(($counter===1) && ($res[5]=="c"))
{
  $_SESSION['userid']=$res[0];
header("location:corporate.php");
}
elseif(($counter===1) && ($res[5]=="s"))
{
  $_SESSION['userid']=$res[0];
header("location:startup.php");
}

}

?>
<html>
<head>
	<style>
	#border-1 {
		border-top: white;
		border-left: white;
		border-right:white;
		width:350px !important;
		margin-left:0;
	}
	
* {
	margin-left:0px;
}
#forget {
	margin-left:200px;
}
.logo {
	font-size:20px;
}
</style>
	<title>My Bootstrap</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<div class="row text-center">
	<div class="col-xl-8 col-sm-6 col-lg-6  col-md-6">
		<img src="img/sample5.jpg" width="1350px" class="card-img" height="640px">
		<div class="card-img-overlay">
			<p class="text-light ml-1 text-left ml-3" style="margin-top:580px;"> Copyright &copy; Crazy Developers | SIH | 2019 (All Rights Reversed)</p>
	</div>
</div>
                                                    <!-- login page.-->
           <form action="login.php" method="post">
	<div class="col-xl-3 col-lg-5 mr-5 ml-3 mt-xl-5 mt-lg-5 mt-md-2 col-md-6"  >
		<p class="text-left"><a href="index.html"  style="text-decoration-color: white;"><i class="fa fa-codiepie fa-3x text-left text-primary active mr-3 mt-4" aria-hidden="true"></i> <span style="font-size:30px;"><span style="color:black;">Code</span><span class="text-primary text-monospace">Pie</span></span></p></a>
		<div class="form-group float-center" style="margin-top:30px!important;">
		  <input id="border-1" name="email" type="text" placeholder="Email" class="form-control input-md" required="Email is required" >
            <input id="border-1" name="password" type="password" placeholder="Password" class="form-control input-sm mt-3 mb-3" required="Password is required" >
             <div class="d-flex justify-content-between mb-3">
        <div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div class="float-right" >
            <a href="forget_password.html"style="text-decoration-color: white;" >Forgot password?</a>
        </div>
    </div>


     <input type="submit" vlaue="Submit" name="submit"  class="btn btn-primary btn-block w-200 p-2 mt-xl-4 mt-sm-5 mt-sm-5" style="width:350px !important;">Log In</button>    
    </div>
     <p class="float-center  ml-xl-5 mr-lg-2"style="margin-left:80px!important;" >Not a member? <a href="signin.php" class="text-primary" style="text-decoration-color: white;"> Register</a> </p>
      <p class="text-center   mr-lg-5 ml-xl-5" style="margin-left:98px!important;" style="text-decoration-color: white;">Or Log In with</p>
      <div class="text-center  mr-lg-2  logo" style="margin-left:90px!important;">
      <a href="https://www.facebook.com"> <i class="fa fa-facebook fa-1x" aria-hidden="true" style="margin-right:15px;"></i></a>
        <a href="https://www.twitter.com">    <i class="fa fa-twitter fa-1x" aria-hidden="true" style="margin-right:15px;"></i></a>
         <a href="https://www.linkedin.com">   <i class="fa fa-linkedin fa-1x" aria-hidden="true" style="margin-right:15px;"></i></a>
          <a href="https://www.github.com">  <i class="fa fa-github fa-1x" aria-hidden="true" style="margin-right:15px;"></i></a>

      </div>
</div>
		<script src="js/jquery-3.3.1.slim.min.js" ></script>
        <script src="js/popper.min.js"></script>
        <script src="css/bootstrap.min.js"></script>
</body>
</html>