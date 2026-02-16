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
  <title>ລາຍການສິນຄ້າທັງໝົດ</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="container mt5">
    <h2 class="text-center mb-4">ລາຍສິນຄ້າທັງໝົດ</h2>
    <div class="d-flex justify-content-between mb-3">
      <a href="./add_product.php" class="btn btn-success">ເພີ່ມສິນຄ້າໃໝ່</a>
    </div>
    <div class="card shadow-sm">
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ລະຫັດສິນຄ້າ</th>
              <th scope="col">ຮູບສິນຄ້າ</th>
              <th scope="col">ຊື່ສິນຄ້າ</th>
              <th scope="col">ລາຍລະອຽດສິນຄ້າ</th>
              <th scope="col">ລາຄາສິນຄ້າ</th>
              <th scope="col">ຈຳນວນ</th>
              <th scope="col">ຈັດການ</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $stmt = $conn->prepare("SELECT * FROM tb_products ORDER BY id DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if (count($result) > 0) {
              foreach ($result as $row) {
            ?>
                <tr>
                  <td><?= $row['id'] ?></td>
                  <td>
                    <?php if (!empty($row['image']) && file_exists("uploads/".$row['image'])): ?>
                        <img src="uploads/<?= $row['image'] ?>" width="150">
                    <?php else: ?>
                        <span class="text-mute">ບໍ່ມີຮູບພາບ</span>
                    <?php endif ; ?>
                  </td>
                  <td><?= $row['name'] ?></td>
                  <td><?= $row['description'] ?></td>
                  <td><?= $row['price'] ?></td>
                  <td><?= $row['qty'] ?></td>
                  <td>
                    <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">ແກ້ໄຂ</a>
                    <a href="delete_product.php?id=<?= $row['id'] ?>"
                      class="btn btn-danger btn-sm"
                      onclick="return confirm('ທ່ານຕ້ອງການລຶບສິນຄ້າ: <?= $row['name'] ?> ແທ້ບໍ່?');">
                      ລຶບ
                    </a
                  </td>
                </tr>
            <?php
              } //end foreach
            } else {
              echo "<tr colspan='5' class='text-center text-danger'>ຍັງບໍ່ມີສິນຄ້າ<td></td></tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>