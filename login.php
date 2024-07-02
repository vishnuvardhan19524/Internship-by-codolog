<?php 
  $username = $_POST['username'];
  $password = $_POST['password'];


  $conn = new mysqli('localhost', 'root', '', 'login');
  if($conn->connect_error){
    die("connection Failed: ".$conn->connect_error);
  }
  else{
    $stmt = $conn->prepare("insert into logintable(username, password)
    values(?, ?)");
    $stmt->bind_param('ss',$username, $password);
    $stmt->execute();
    echo "Succesfully Login........";
    $stmt->close();
    $conn->close();
  }




?>