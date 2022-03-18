<?php
include 'includes/header.php';

//     $username =  $_POST['username'];
// 	$pwd = $_POST['pwd'];

// if(isset($_POST['submit'])){
// 	$username = mysqli_real_escape_string($conn, $_POST['username']);
// 	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		
// $sql = "SELECT username, pwd FROM users WHERE username = '$username'";
// $result = mysqli_query($conn, $sql) or trigger_error(mysqli_error($conn));
// $row = mysqli_num_rows($result);
// // $result = $conn->query($sql);
// // $row = $result->fetch_assoc(); // output data of each row
// if ($row != 1) {
//     echo "Incorrect username or password <br/>";
//     echo "<a href='login.php'>back to page</a>";
//    } else{
//    header("Location: admin.php");
//    exit();
// }} // end of isset
// $conn->close();



if(isset($_POST['submit'])){
	
	$username = $_POST['username'];
	$Userpassword = $_POST['pwd'];
	
	
  if($stmt = $conn->prepare("SELECT username, password from users where username = ?")){

  	$stmt->bind_param("s", $username);

  	$stmt->bind_result($username, $pwd);
    $stmt->execute(); 
	$stmt->fetch();

   
       if(password_verify($Userpassword,$pwd)){
			

			header('location:admin.php');
			} // end  if


		else{
			header('location:login.php');


		} // end of else

} // end of stmt check ////////////////////////////////////////////////////////////////
		else{
	header('location:login.php');
	
	}
       


  } // end of isset

	 
?>
