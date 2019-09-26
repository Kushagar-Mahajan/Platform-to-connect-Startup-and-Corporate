<?php
include_once('profile/header.php');
include_once('profile/profilecorporatenav.php');
session_start();
// userid
$uid = $_SESSION['userid'];
include_once('conn.php');
$check = "SELECT * from account_table where id = '$uid'";

//mysql query neccessary 
$myqrycheck=mysqli_query($conn, $check);
$countercheck=mysqli_num_rows($myqrycheck);
$checkres=mysqli_fetch_row($myqrycheck);
echo $countercheck;
// check userid
if($_SESSION['userid'] != $checkres[0]){
header("location:login.php");

}
$action = Isset($_REQUEST['submit'])?$_REQUEST['submit']:"You Must Be Kidding!!!!!!";

if($action == 'Update')
{
  //About section

$cname=$_POST['companyname'];

  //list challenges
   
include_once('conn.php');
$sql = "UPDATE challenge
 SET info = '$cname'
WHERE id = '$uid'";


if (mysqli_query($conn, $sql)) {
 echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}

else{
  echo "";
}
?>

<body style="text-align: center;">
<form action="updatecompany.php" method="post">
	<h2>Update/Add Company  Name</h2>
	<br>
	<input type ="text" placeholder="company name" name="companyname" ><br /><br />
	<input type="submit" value="Update" name="submit">
</form>



	</body>