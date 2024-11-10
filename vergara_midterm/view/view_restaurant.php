<?php

include ('../classes/connection.php');


if (isset($_POST['menu_page'])){
    $username = $_GET['user'];
    $userId = $_GET['id'];

    $result = $connection->query("INSERT INTO `orders` (`user_id`) VALUES ('$userId')");

    if ($result) {
        $orderId = $connection->insert_id;
        header("Location: /vergara_midterm/view/view_menu_items.php?user=$username&id=$userId&orderid=$orderId"); 
        exit;
    } else {
        echo "Error: " . $connection->error;
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        body{
            background-image: url('../img/bg2.jpg');
            color: white;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-5">
        <h1>Welcome to Lorena's Canteen</h1>
        <form method="POST">
        <button  class="btn btn-primary" name="menu_page" type="submit">ORDER HERE</button>
        </form>
        
    </div>


    <script>

    </script>
</body>
</html>