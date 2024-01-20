<?php
session_start();

$host="localhost";
$username="root";
$pass="";
$db="SMTS";

$conn=mysqli_connect($host,$username,$pass,$db);
if(!$conn){
	die("Database connection error");
}

// insert query for register page
if(isset($_POST['submit']))
{         $n = $_SESSION['email'];
	$id=$_POST['id'];
	$name=$_POST['username'];
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	$phone_number=$_POST['phone_number'];
	$branch=$_POST['branch'];
	$n = isset($_SESSION['email']) ? $_SESSION['email'] : '';
	
	echo"$n";
		
	
	
	$query="UPDATE `STUDENT` SET `id`='$id',`username`='$name',`phone_number`='$phone_number', `branch`='$branch' where `email`= '$n'";	
	$res=mysqli_query($conn,$query);
	if($res){
		 echo "<script>
alert('Data Updated successfully!');
window.location.href='profile.php';
</script>";
		
	}else{
		echo "<script>
alert('Data not updated ,try again.....!!');
window.location.href='update1.php';
</script>";
	}
	
}



?>
