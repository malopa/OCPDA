<?php
include ("../connection/connection.php");

$response =array();
$target="../pictures/";

 $name = $_POST['picName'];
 $price = $_POST['price'];
 $description = $_POST['description'];
 $id = (int)$_POST['id'];
$full_path = $target.basename($_FILES['photo']['name']);



	if(move_uploaded_file($_FILES['photo']['tmp_name'], $full_path)){
    $photo = "http://192.168.137.1/ocpda/pictures/".$_FILES['photo']['name'];
	$query = "INSERT INTO items(image,name,price,description,saler_id) VALUES('$photo','$name','$price','$description','$id')";
	$result=mysqli_query($conn,$query) or die("Fail ". mysqli_errno());
  $response['message']="Upload successfully ";
}else {
  $response['message']="Upload failed";
}
echo json_encode($response);
 ?>
