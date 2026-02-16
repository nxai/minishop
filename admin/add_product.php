<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
require_once './condb.php'; //ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ເພີ່ມສິນຄ້າໃໝ່</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <h1>ເພີ່ມສິນຄ້າໃໝ່</h1>
    <form action="save_product.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="p_name" class="form-label">ຊື່ສິນຄ້າ</label>
            <input type="text" class="form-control" name="p_name">
        </div>
        <div class="mb-3">
            <label for="cat_id" class="form-label">ປະເພດສິນຄ້າ</label>
            <select name="cat_id" class="form-control" required>
              <option value="">-- ກະລຸນາເລືອກ --</option>
              <?php
                  $stmt = $conn->prepare("SELECT * FROM tb_categories");
                  $stmt->execute();
                  while($cat = $stmt->fetch(PDO::FETCH_ASSOC) ){
                    echo "<option value='{$cat['cat_id']}'>{$cat['cat_name']}</option>";
                  }
              ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">ລາຍລະອຽດສິນຄ້າ</label>
           <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="p_price" class="form-label">ລາຄາສິນຄ້າ</label>
            <input type="number" class="form-control" name="p_price">
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">ຈຳນວນ</label>
            <input type="number" class="form-control" name="qty">
        </div>
         <div class="mb-3">
            <label for="p_image" class="form-label">ຮູບພາບ</label>
            <input type="file" class="form-control" name="p_image" accept="image/*" required>
        </div>
        <button type="submit" name="btn_save" class="btn btn-success">ບັນທຶກ</button>
        <a href="index.php" class="btn btn-secondary">ກັບຄຶນ</a>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>