<?php

if (isset($_POST['menu_page'])){
    header('Location: /vergara_midterm/view/view_menu_items.php');
    exit;
} else if (isset($_POST['cart_page'])){
    header('Location: /vergara_midterm/view/view_cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="container-fluid p-5">
        <h1>This is my restaurant</h1>
        <form method="POST">
        <button  class="btn btn-primary" name="menu_page" type="submit">View menu</button>
        <button  class="btn btn-info" name="cart_page"type="submit">View order</button>
        </form>
        
    </div>


    <script>

    </script>
</body>
</html>