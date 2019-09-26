<?php
include_once('profile/header.php');
include_once('profile/profilecorporatenav.php');

session_start();
// userid
$uid = $_SESSION['userid'];
echo $uid;
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

if($action == 'update')
{
  //About section

$phone=$_POST['phone'];
$email=$_POST['email'];
echo $email;
  //list challenges
   
include_once('conn.php');
$sql = "UPDATE personal
 SET phone = '$phone', email='$email'
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
	<h2> Update\ Add Contact</h2>
	<br>
<form>
	<input type ="number" placeholder="phone no" name="phone" ><br /><br />
	<input type ="email" placeholder="email" name="email" ><br /><br />
	<input type="submit" value="update" name="submit">
</form>
</body>