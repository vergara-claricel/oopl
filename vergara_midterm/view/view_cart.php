<?php
include('../classes/order.php'); 
include('../classes/cart.php');


$orderId = $_GET['orderid'];
$user = $_GET['user'];
$userId = $_GET['id'];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <style>
        .header{
            color:white;
            display:flex;
            justify-content: space-between;
            background-color: black;
           padding: 2rem;
        }
    </style>
</head>
<body>
<div class="header">
        <p>My Resto</p>

    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cart">
                    <h4>Cart</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <h3>Order ID: </h3>
                            </tr>
                            <tr>
                                <th>Quantity * Item Price</th>
                                <th scope= "col" >Item Name</th>
                                <th scope= "col" >Item/s Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php
                        $itemz = new Cart();
                        $ordered_items = $itemz->viewCart($orderId);
                        

                        if (empty($ordered_items)) {
                            echo '<tr><td colspan="3">Your cart is empty.</td></tr>';
                        } else{
                            foreach($ordered_items as $key => $value){
                                
                                $itemTotal = $value['price'] * $value['quantity'];
                                echo '<tr> <td>' . $value['quantity'] . ' x ' . $value['price']. '</td> 
                                <td> ' . $value['name'] . '</td> 
                                <td> ' . $itemTotal  . '</td>
                                 <form method="POST"> 
                                <input type=""hidden style="display:none;" name="cartid" value="'. $value['cart_id'] .'" >
                                
                                <td> <button type="submit" name="remove" class="btn btn-danger"> Remove </button> </td> 
                                </form>
                                
                                </tr>';
                            }
                        }

                        if(isset($_POST['remove'])){
                            $cartid = $_POST['cartid'];

                            $itemz->removeItem($cartid);
                            header("Location: /vergara_midterm/view/view_cart.php?user=$user&id=$userId&orderid=$orderId");
                            exit;
                        }
                        
                        ?>
                        <tr>
                            <th colspan="2"> TOTAL AMOUNT</th>
                            <th>
                                <?php $total=$itemz->totalAmount($orderId);
                                echo $total;
                                ?>
                            </th>
                        </tr>
                        </tbody>
                    </table>
                    <form method="POST">
                    <button name="backToMenu" type="submit">Back to Menu </button>
                    <button name="checkout" type="submit">Proceed to Checkout</button>
                    </form>
                    <?php
                    if(isset($_POST['backToMenu'])){
                        header("Location: /vergara_midterm/view/view_menu_items.php?user=$user&id=$userId&orderid=$orderId");
                    } else if(isset($_POST['checkout'])){
                        if(empty($ordered_items)){
                            echo 'No order made. Checkout not possible.';
                        } else {
                            $connection->query("UPDATE `orders` SET `totalamount` = '$total' WHERE order_id = $orderId");
                            header("Location: /vergara_midterm/view/checkout.php?user=$user&id=$userId&orderid=$orderId");
                        }
                       
                    } 
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

<script>


</script>
</html>