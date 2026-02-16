<?php
require_once '../config/auth.php'; //ກວດເຊັກການລ໋ອກອິນ
require_once '../config/condb.php'; //ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ


    // Insert
    if(isset($_POST['save'])){
        $stmt = $conn->prepare("INSERT INTO tb_categories (cat_name) VALUES (:name)");
        $stmt->bindParam(':name', $_POST['cat_name']);
        $stmt->execute();
    }
?>

<form method="post">
    <input type="text" name="cat_name" required>
    <button type="submit" name="save">ບັນທຶກ</button>
</form>

<table border="1">
    <tr><th>ID</th><th>Category Name</th></tr>
    <?php
        $stmt = $conn->prepare("SELECT * FROM tb_categories");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<tr><td>{$row['cat_id']}</td><td>{$row['cat_name']}</td></tr>";
        }
    ?>
</table>