<?php
include('../vergara_midterm/classes/connection.php');
include('../vergara_midterm/classes/customer.php');

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $customer = new Customer($username, $password);
    $user = $customer->login();

    if($user){
        $userId = $user['id']; 
        header("Location: /vergara_midterm/view/view_restaurant.php?user=$username&id=$userId");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to order</title>
    <link rel="stylesheet" href="../vergara_midterm/css/bootstrap.css">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-image: url('img/bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            color: white;
        }

        .container{
            display: flex;
            justify-content: center;
        }


    </style>
</head>
<body>

   <div class="container">
   <form method="post">
        <label for="username">Enter username</label>
        <input type="text" name="username">
        <label for="password">Enter password</label>
        <input type="password" name="password">
        <button class="btn btn-warning"type="submit" name="login">Login</button>
    </form>
   </div>
</body>
</html>