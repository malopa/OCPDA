<?php
include ("../connection/connection.php");


$username = $_POST['username'];
$password = $_POST['password'];


$response = array();
$query = "SELECT id,FirstName,Status FROM users WHERE UserName='$username' AND Password='$password'";
$result = mysqli_query($conn,$query);
$no = mysqli_num_rows($result);
if ($no > 0) {
  $response['error'] = false;
  while ($row = mysqli_fetch_assoc($result)) {
    $data =array();
    $response['error'] = false;
    $response['user']['id'] = $row['id'];
    $response['user']['username'] = $row['FirstName'];
    $response['user']['status'] = $row['Status'];
  }

}else {
  $response['error'] = true;
  $response['message'] = " Wrong Username or password";
}

  echo json_encode($response);


 ?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
