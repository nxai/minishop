<?php
  require_once './condb.php';//ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ
  if($_SERVER["REQUEST_METHOD"]== "POST"){
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $sql = "INSERT INTO tb_users (username,password,fullname) VALUES (:user,:pass,:fname)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':user' =>$username,
                ':pass' =>$hashed_password,
                ':fname' =>$fullname,
            ]);
            echo "ລົງທະບຽນສຳເລັດ!";
        } catch (PDOException $e) {
                echo "ລົງທະບຽນຜິດພາດ!" .$e->getMessage();
        }
  }