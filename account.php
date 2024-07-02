<?php 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];


  $conn = new mysqli('localhost', 'root', '', 'account');
  if($conn->connect_error){
    die("connection Failed: ".$conn->connect_error);
  }
  else{
    $stmt = $conn->prepare("insert into account_table(name, email, password, cpassword)
    values(?, ?, ?, ?)");
    $stmt->bind_param('ssss',$name, $email, $password, $cpassword);
    $stmt->execute();
    echo "Account Creation Succesfully Completed........";
    $stmt->close();
    $conn->close();
  }




?>