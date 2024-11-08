<?php
 include('../classes/connection.php');
 include('../classes/menu_items.php');
 include('../classes/cart.php');

 if (isset($_POST['addToCart'])){
    if (isset($_POST['quantity' > 0])){
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $quantity = $_POST['quantity'];
        $order_id = $_POST['order_id'];

        $addquery = $connection->query("INSERT INTO `cart`(`order_id`,`name`, `quantity`, `price`) VALUES ('$order_id','$item_name','$quantity','$item_price')");
    } else {
        echo '<script>alert("Quantity cannot be zero.");</script>';
    }
    
 }

        if (isset($_POST['view_cart'])){
            header('Location: /vergara_midterm/view/view_cart.php');
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <form method="POST">
    <button type="submit" name="view_cart" class="btn btn-info">View cart</button>
    </form>

    <div class="container">
        <div class="row">
            <div class="col">
                <?php
                    $items = new MenuItems();
                    $menu_items = $items->viewMenu();
                    foreach($menu_items as $key => $value){

                    
                    echo '
                    <form method="POST" autocomplete="off">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">'. $value['name'] . '</h5>
                            <p class="card-text"> '. $value['price'] . '</p>
                            <input type="number" name="quantity" value="0"  min="0">
                            <input type="number" name="order_id">
                            <input type="hidden" name="item_name" value="'. $value['name'] . '">
                            <input type="hidden" name="item_price" value="'. $value['price'] . '">
                            <input name="addToCart" class="btn btn-primary" type="submit" value="Add To Cart">
                        </div>
                        </div>

                        </form>';
                    }                
                ?>
            </div>
        </div>
    </div>

</body>

<script>

</script>
</html>