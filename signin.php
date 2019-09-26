<?php
//heading
$action = Isset($_REQUEST['submit'])?$_REQUEST['submit']:"You Must Be Kidding!!!!!!";

if($action == 'Submit')
{

$name=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['password_1'];
$id=time();
$type=$_POST['selectbasic'];
$dt_created=date('d-M-Y');
$status='a'; //a =active and i=inactive

$servername="localhost";
$username="root";
$password="";
$dbname="codepie";

$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "insert into account_table(id, username, email, password,dt_created,type,status) VALUES('$id','$name','$email','$pass','$dt_created','$type','$status')";
$sql1 = "INSERT into personal(id,type) VALUES('$id','$type')";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}
else{
  echo "";
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

</style>
	<title>My Bootstrap</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
  <div class="row">
	<div class="col-xl-8 col-sm-6 col-lg-6  col-md-6">
		<img src="img\sample5.jpg" width="1350px" class="card-img" height="640px" >
		<div class="card-img-overlay">
			<p class="text-light ml-1 text-left ml-3" style="margin-top:580px;"> Copyright &copy; Crazy Developers | SIH | 2019 (All Rights Reversed)</p>
	</div>
</div>

	<div class="col-xl-3 col-lg-5 mr-5 ml-3 mt-xl-5 mt-lg-5 mt-md-2 col-md-6"  >
		<p class="text-left"><a href="index.html" style="text-decoration-color: white;"><i class="fa fa-codiepie fa-3x text-left text-primary active mr-3 mt-4" aria-hidden="true"></i><span style="font-size:30px; color:black;">Code<span class="text-primary text-monospace">Pie</span></span></p></a>
		<form action="signin.php" method="post">
		    <input id="border-1" name="username" type="text" placeholder="Name" class="form-control input-md" required="Name is required">
		    <input id="border-1" name="email" type="email" placeholder="Email" class="form-control input-sm mt-3 mb-3" required="Email is required"> 
            <input id="border-1" name="password_1" type="password" placeholder="Password" class="form-control input-sm mt-3 mb-3" required="Password is required">
            <input id="border-1" name="password" type="password" placeholder=" Confirm Password" class="form-control input-sm mt-3 mb-3" required="Password is required">
              
             <div class="col-md-14" id="border-1">
             <select  name="selectbasic" class="form-control" placeholder="User Type">
             <option value="c" name="c">Corporate Representative </option>
             <option value="s" name="s">Startup Representative</option>
             </select>
               </div>
         
           <label><input type="checkbox" class="mt-4 ml-2">I agree to the Terms and Conditions</label>
    
           <input type="submit" class="btn btn-primary mt-3 btn-block w-200 p-2" name="submit" value="Submit"  style="width:350px !important;">
           <p class="text-center mt-3 ml-5"> Already a account? <a href="login.php" style="text-decoration-color: white;">Log In</a></p>
             

</div>
</div>
</form>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>