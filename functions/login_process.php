<?php
session_start();
  require_once '../config/condb.php';//ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ

  if($_SERVER["REQUEST_METHOD"]== "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM tb_users WHERE username = ?");
        $stmt->execute([$username]);
        $user_data= $stmt->fetch();

        if($user_data && password_verify($password,$user_data['password'])){
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['username'] = $user_data['username'];
            $_SESSION['role'] = $user_data['role'];

            if($user_data['role'] == 'admin'){
                header("Location: ../admin/dashboard.php");
            exit();
            }else {
                header("Location: ../index.php");
            } 
        }else{
            echo "username & Password Wrong!";
        }
  }


  ?>