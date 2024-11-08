<?php
include('../classes/order.php'); 
include('../classes/cart.php');
include('../classes/paymentmethod.php');

if(isset($_POST['backToMenu'])){
    header('Location: /vergara_midterm/view/view_menu_items.php');
} else if(isset($_POST['payment'])){
    header('Location: /vergara_midterm/view/checkout.php');
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

    <h1>hehe</h1>
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
                                <th scope= "col" >Item Total</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <?php
                        $itemz = new Cart();
                        $ordered_items = $itemz->viewCart();
                        foreach($ordered_items as $key => $value){
                            $itemTotal = $value['price'] * $value['quantity'];
                            echo '<tr> <td>' . $value['quantity'] . ' x ' . $value['price']. '</td> 
                            <td> ' . $value['name'] . '</td> 
                            <td> ' . $itemTotal  . '</td>
                            <td> <button class="btn btn-danger"> Remove </button></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                    <form method="POST">
                    <button name="backToMenu" type="submit">Back to Menu </button>
                    <button name="checkout" type="submit">Proceed to Checkout</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</body>

<script>


</script>
</html>