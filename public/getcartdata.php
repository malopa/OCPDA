<?php
include ("../connection/connection.php");


// $test = array();
// array_push($test,2,3,4,5,6,7);

// echo json_encode(count($test));

$data = $_POST['cart_data'];

// var_dump(count($data));
// die();

$response=array();
foreach ($data as  $value) {
  $query="SELECT price,image FROM items WHERE id='$value'";
  $result = mysqli_query($conn,$query);
  if ($result) {
    while ($row=mysqli_fetch_assoc($result)) {
      $response['data_in_cart']['image'] = $row['image'];
      $response['data_in_cart']['price'] = $row['price'];
    }
  }



}

echo json_encode($response);

// foreach ($variable as $key => $value) {
  # code...
// }


 ?>
