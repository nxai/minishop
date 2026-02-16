<?php
require_once '../config/auth.php'; //ກວດເຊັກການລ໋ອກອິນ
require_once '../config/condb.php'; //ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ

//ກວດສອບວ່າ ມີການສົ່ງ ID ມາຫຼືບໍ່
// echo $_GET['id'];
if(isset($_GET['id'])){
  $id = $_GET['id'];
  try{
    $stmt_img = $conn->prepare("SELECT image FROM tb_products WHERE id =:id");
    $stmt_img->bindParam(':id', $id);
    $stmt_img->execute();
    $row = $stmt_img->fetch(PDO::FETCH_ASSOC);

    if($row){
        $image_name = $row['image'];
        if(!empty($image_name) && file_exists("uploads/". $image_name)){
            unlink("uploads/" .$image_name);
        }
    }
    $sql = "DELETE FROM tb_products WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        echo "<script>
        alert('ລຶບຂໍ້ມູນສຳເລັດ!');
        window.location='product.php';
            </script>";
    }else{
        echo "<script>
        alert('ລຶບຂໍ້ມູນຜິດພາດ!');
            </script>";
    }
  } catch(PDOException $e) {
    echo "ເກິດຂໍ້ຜິດພາດ".$e->getMessage();
  }
}else {
    header("Location: product.php");
    exit();
}
?>