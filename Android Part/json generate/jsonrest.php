<?php 

$sql = "SELECT * FROM users";

require_once('dbConnect.php');

$r = mysqli_query($con,$sql);

$result = array();

while($row = mysqli_fetch_array($r)){
    array_push($result,array(
        'id'=>$row['id'],
        'name'=>$row['name'],
        'email'=>$row['email'],
        'password'=>$row['password'],
        'remember_token'=>$row['remember_token'],
        'created_at'=>$row['created_at'],
        'updated_at'=>$row['updated_at'],
    ));
}

echo json_encode(array('result'=>$result));

mysqli_close($con);
?>