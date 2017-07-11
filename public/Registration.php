<?php
include ("../connection/connection.php");


$FirstName=$_POST["firstname"];
$Lastname=$_POST["lastname"];
$UserName=$_POST["username"];
$Password=$_POST["password"];
$phone=$_POST["phone"];
$location=$_POST["location"];
$status=$_POST["status"];
$response=array();
$query="INSERT INTO USERS(FirstName, LastName, UserName, Password, PhoneNumber, Location, Status)
              VALUES( '$FirstName', '$Lastname', '$UserName', '$Password', '$phone', '$location', '$status')";

$result = mysqli_query($conn,$query);
if($result)
{
$response['message'] = true;

$stmt1 = "SELECT id, UserName, Status FROM users WHERE UserName = '$UserName'";
 $result2 = mysqli_query($conn,$stmt1);


 $user = array();
 if ($result2) {
   while ($row=mysqli_fetch_assoc($result2)) {
     $response['registered_user']['id'] = $row['id'];
     $response['registered_user']['username'] = $row['UserName'];
     $response['registered_user']['status'] = $row['Status'];
   }

 }


$conn->close();
}else
{
  $response['error']="Registration Failed";
}

echo json_encode($response);
?>
