<?php
require_once '../config/auth.php'; //ກວດເຊັກການລ໋ອກອິນ
require_once '../config/condb.php'; //ເຊື່ອມຕໍ່ຖານຂໍ້ມູນ

  if (!isset($_GET['id'])){
    header('Location: index.php');
    exit();
  }
  $id = $_GET['id'];
//   echo $id;

$stmt = $conn->prepare("SELECT * FROM tb_products WHERE id =:id");
$stmt->bindParam(':id',$id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$row){
     echo "<script>
        alert('ບໍ່ພົບຂໍ້ມູນ!');
        window.location='index.php';
            </script>";
}

$stmt_cat = $conn->prepare("SELECT * FROM tb_categories");
$stmt_cat->execute();
$categories = $stmt_cat->fetchAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ແກ້ໄຂສິນຄ້າ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <h1>ແກ້ໄຂສິນຄ້າ</h1>
    <form action="update_product.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="p_id" value="<?= $row['id'] ?>">
        <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
        <div class="mb-3">
            <label for="p_name" class="form-label">ຊື່ສິນຄ້າ</label>
            <input type="text" class="form-control" name="p_name" value="<?= $row['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="cat_id" class="form-label">ປະເພດສິນຄ້າ</label>
            <select name="cat_id" class="form-control" required>
              <option value="">-- ກະລຸນາເລືອກ --</option>
              <?php foreach($categories as $cat): ?>
                     <option value="<?= $cat['cat_id'] ?>" <?= ($cat['cat_id'] == $row['cat_id']) ? 'selected': '' ?>>
                        <?= $cat['cat_name'] ?>
                     </option>
                <?php endforeach ; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">ລາຍລະອຽດສິນຄ້າ</label>
           <textarea name="description" class="form-control"><?= $row['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="p_price" class="form-label">ລາຄາສິນຄ້າ</label>
            <input type="number" class="form-control" name="p_price" value="<?= $row['price'] ?>">
        </div>
        <div class="mb-3">
            <label for="qty" class="form-label">ຈຳນວນ</label>
            <input type="number" class="form-control" name="qty" value="<?= $row['qty'] ?>">
        </div>
         <div class="mb-3">
            <label for="p_image" class="form-label">ຮູບພາບ</label>
            <input type="file" class="form-control" name="p_image" accept="image/*">
            <div class="mt-2">
                <small class="text-mute">ຮູບປະຈຸບັນ:</small><br>
                <?php if($row['image']): ?>
                    <img src="uploads/<?= $row['image'] ?>" width="150" class="img-thumbnail mt-1">
                <?php else: ?>
                    <span class="badge bg-secondary">ບໍ່ມີຮູບພາບ</span>
                <?php endif; ?>
            </div>
        </div>
        <button type="submit" name="btn_update" class="btn btn-success">ບັນທຶກການແກ້ໄຂ</button>
        <a href="index.php" class="btn btn-secondary">ກັບຄຶນ</a>
    </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>