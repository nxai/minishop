<?php
require_once '../config/auth.php'; //ກວດເຊັກການລ໋ອກອິນ
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>ຍິນດີຕ້ອນຮັບ <?php echo htmlspecialchars($_SESSION['username']) ?> </h1>
    <p>ທ່ານໄດ້ເຂົ້າສູ່ລະບົບສຳເລັດ!</p>
    <hr>
    <a href="./product.php">ສິນຄ້າ</a>
    <a href="../logout.php">ອອກລະບົບ</a>
</body>
</html>