<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>ເຂົ້າສູ່ລະບົບ</h2>
    <form action="./functions/login_process.php" method="post">
        Username: <br>
        <input type="text" name="username" required><br>
        Password: <br>
        <input type="password" name="password" required><br>
        <button type="submit">ເຂົ້າສູ່ລະບົບ</button>
    </form>
    <a href="./register.php">ລົງທະບຽນຢູ່ທີ່ນີ້!</a>
</body>
</html>