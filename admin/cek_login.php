<?php
  include "../config/config.php";

  $username = mysqli_real_escape_string($con, $_POST['username']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $password = md5($password); 
    

  $login  = $con->prepare("SELECT * FROM user WHERE username = ? AND password= ?");
  $login->bind_param('ss', $username, $password);
  $login->execute();
  $row = $login->get_result()->fetch_array();

  if ((@$row['username']) AND (@$row['password']))
  {
    session_start();
    $_SESSION['username']     = $row['username'];
    $_SESSION['id']           = $row['id'];
    $_SESSION['password']     = $row['password'];
    $_SESSION['namadepan']    = $row['nama_depan'];
    $_SESSION['namabelakang'] = $row['nama_belakang'];
  
    header("Location:home.php");
  }
  else
  {
    echo "<script>
          alert('username atau password salah');
    </script>";
    header("Location:index.php");
  }
?>