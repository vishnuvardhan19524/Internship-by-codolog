<?php 
  $email = $_POST['email'];
  $password = $_POST['password'];


  $conn = new mysqli('localhost', 'root', '', 'account');
  if($conn->connect_error){
    die("connection Failed: ".$conn->connect_error);
  }
  else{
    $stmt = $conn->prepare("select * from account_table where email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
      $data = $stmt_result->fetch_assoc();
      if($data['password'] == $password){
        echo"<h1>Login Successfully....</h1>";
      } 
      else{
          echo"<h1>Invalid email or Password you Entered</h1>";
      }

    }
    else{
      echo'<h1>Invalid Email or Password</h1>';
    }




  }




?>