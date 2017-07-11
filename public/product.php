<?php
include ("../connection/connection.php");


$id= $_GET['id'];

$datas['data'] = array();
$query = "SELECT name,image,price,description FROM items WHERE saler_id='$id'";
$result = mysqli_query($conn,$query);
$no = mysqli_num_rows($result);
if ($no > 0) {
  while ($data = mysqli_fetch_assoc($result)) {
array_push($datas['data'],$data);
  }

}else {
  $datas['data'] = "No data found";
}

  echo json_encode($datas);

 ?>
