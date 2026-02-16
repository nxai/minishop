<?php
require_once '../config/auth.php'; //ກວດເຊັກການລ໋ອກອິນ
require_once '../config/condb.php'; //ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ
if(isset($_POST['btn_save'])){
//ຮັບຄ່າຈາກຟອມ ມາເກັບໃນຕົວປ່ຽນ
$pname = $_POST['p_name'];
$cat_id = $_POST['cat_id'];
$description = $_POST['description'];
$price = $_POST['p_price'];
$qty=$_POST['qty'];
// var_dump($_POST);
$image_file = '';

// ກວດສອບວ່າເລືອກໄຟລ໌ມາຫຼືບໍ່
    if(isset($_FILES['p_image']) && $_FILES['p_image']['error'] == 0){
        // ສ້າງຊື່ໄຟລ໌ໃໝ່ (ປ້ອງກັນຊື່ຊ້ຳ): ເວລາ_ຊື່ເດີມ
        $ext = pathinfo($_FILES['p_image']['name'], PATHINFO_EXTENSION); // ນາມສະກຸນໄຟລ໌
        $new_name = time() . "_" . rand(100,999) . "." . $ext;
        
        // ຍ້າຍໄຟລ໌ໄປໂຟນເດີ uploads (ຕ້ອງສ້າງໂຟນເດີ uploads ໄວ້ກ່ອນເດີ້)
        $target = "uploads/" . $new_name;
        if(move_uploaded_file($_FILES['p_image']['tmp_name'], $target)){
            $image_file = $new_name;
        }
    }

try {
    $sql ="INSERT INTO tb_products (name,description,price,qty,image,cat_id) VALUES (:name,:description, :price,:qty,:image,:cat_id)";

    $stmt =$conn->prepare($sql);

    $stmt->bindParam(':name',$pname);
    $stmt->bindParam(':description',$description);
    $stmt->bindParam(':price',$price);
    $stmt->bindParam(':qty',$qty);
    $stmt->bindParam(':image',$image_file);
    $stmt->bindParam(':cat_id',$cat_id);
    if($stmt->execute()){
        echo "<script>
        alert('ບັນທຶກຂໍ້ມູນສຳເລັດ!');
        window.location='product.php';
            </script>";
    }else{
        echo "<script>
        alert('ບັນທຶກຂໍ້ມູນຜິດພາດ!');
            </script>";
    }
} catch(PDOException $e){
    echo "ເກິດຂໍ້ຜິດພາດ".$e->getMessage();
}
}
?>