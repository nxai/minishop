<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
</head>
<body>
    <h2>ຟອມລົງທະບຽນ</h2>
    <form action="./functions/register_process.php" method="post">
        Fullname: <br>
        <input type="text" name="fullname" required><br>
        Username: <br>
        <input type="text" name="username" required><br>
        Password: <br>
        <input type="password" name="password" required><br>
        <button type="submit">ລົງທະບຽນ</button>
    </form>
</body>
</html>