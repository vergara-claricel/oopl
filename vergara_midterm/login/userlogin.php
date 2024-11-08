<?php
include('../classes/connection.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $q1 = "SELECT * from users where `username` = '$username' and `password` = '$password'";
    $res = mysqli_query($connection, $q1);
    $user = mysqli_fetch_assoc($res);

    if($user){
        header('Location: /vergara_midterm');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to order</title>
</head>
<body>
    <form method="post">
        <label for="username">Enter username</label>
        <input type="text" name="username">
        <label for="password">Enter password</label>
        <input type="password" name="password">
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>