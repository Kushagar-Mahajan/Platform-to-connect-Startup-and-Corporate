<?php
include_once('profile/header.php');
include_once('profile/profilecorporatenav.php');


//session start
session_start();
// userid
$uid = $_SESSION['userid'];
include_once('conn.php');
$check = "SELECT * from account_table where id = '$uid'";

//mysql query neccessary 
$myqrycheck=mysqli_query($conn, $check);
$countercheck=mysqli_num_rows($myqrycheck);
$checkres=mysqli_fetch_row($myqrycheck);
// check userid
if($_SESSION['userid'] != $checkres[0]){
header("location:login.php");
}


$action = Isset($_REQUEST['submit'])?$_REQUEST['submit']:"You Must Be Kidding!!!!!!";

if($action == 'Update')
{
  //About section

$address=$_POST['address'];
$pin=$_POST['pincode'];
$city=$_POST['city'];
$country=$_POST['country'];
  //list challenges
   
echo $address;


include_once('conn.php');
$sql = "UPDATE personal
 SET address = '$address', pincode='$pin', city='$city', country='$country'
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

<body style="text-align:center">
	<h2> Add/ Update Address</h2>
	<br>
	<form action="updateaddress.php" method="post">
		<input type="text" placeholder="address" name="address"><br /><br />
		<input type="number" placeholder="pincode" name="pincode"><br /><br />
        <input type="city" placeholder="city" name="city"><br /><br />
        <input type="country" placeholder="country" name="country"><br /><br />
       <input type="submit" value="Update" name="submit">
	</form>

</body>