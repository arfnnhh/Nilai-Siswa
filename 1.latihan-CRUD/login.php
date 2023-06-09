<?php
session_start();
if(isset($_SESSION['username'])){
//    header("Location:input.php");
echo $_SESSION['username'];  //cek SESSION
} else if(isset($_POST['submit'])){
   $conn = mysqli_connect("localhost", "root", "", "db");

   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) > 0){ 
      $data = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $data['username'];
      header("Location:input.php");
   } else {
      echo "<script>
      alert('Username atau Password Salah ')
      document.location.href = 'index.php'; 
      </script>";
   }      
}

