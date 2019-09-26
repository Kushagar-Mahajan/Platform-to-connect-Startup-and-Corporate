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

$textname=$_POST['textarea'];
  //list challenges
   
include_once('conn.php');
$sql = "UPDATE personal
 SET about = '$textname'
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
<body >
<form  action="updateAbout.php" method="post">
	  <div class="col-md-4  text-center" style="text-align:center;">
	  <H2> Update/Add About Us</H2>    
   <textarea class="form-control" id="textarea" name="textarea">default text</textarea>
       </div>
       <br />
       <input type="submit" name="submit" value="update" class="btn btn-primary ml-5 ">	
</form>


	</body>