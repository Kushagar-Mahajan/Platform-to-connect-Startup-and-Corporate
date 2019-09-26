<?php
session_start();
$action = isset($_REQUEST['submit'])?$_REQUEST['submit']:"You Must Be Kidding!!!!!!";
$uid = $_SESSION['userid'];
include_once('conn.php');
$check = "SELECT * from account_table where id = '$uid'";

if($action == 'Submit')
{

$id=time();
$cname = $_POST['challengename'];

$check = mysqli_query($conn, "SELECT * FROM table_name WHERE cname =" . $cname);
if ($uid == $check) {
	echo "cannot chanekjhf;";
}

else {
	$servername="localhost";
$username="root";
$password="";
$dbname="codepie";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//$sql = "UPDATE challenge SET('id', 'cid', 'cname') VALUES('$uid', '$id','$cname')";

$sql = "INSERT INTO 'challenge'('id', 'cname') VALUES($uid, $cname);";

 $myqry=mysqli_query($conn, $sql);
 //$res=mysqli_fetch_row($myqry);



//if(($counter ==1) && ($res[5]=="a"))
//{
 // $_SESSION['userid']=$res[0];
//header("location:admin.php");
//}
//elseif(($counter==1) && ($res[5]=="c"))
//{
  //$_SESSION['userid']=$res[0];
//header("location:corporate.php");
//}
//elseif(($counter==1) && ($res[5]=="s"))
//{
 // $_SESSION['userid']=$res[0];
//header("location:startup.php");
//}

//}
}
}
?>
<body style="text-align: center">
<h2> Update\ Add Challenges</h2>
<br>
<form action="updatechallenges.php" method="post">
<input type="text" placeholder="Challenge Name" name="challengename"><br /><br />
<textarea placeholder="Information" name="info"></textarea><br /><br />
<input type="text" placeholder="startdate" name="startdate"><br /><br />
<input type="text" placeholder="enddate" name="enddate"><br /><br />
<input type="submit" name="submit" value="Submit">
</form>

</body>