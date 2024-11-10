<?php
    include('../classes/paymentmethod.php');
    include('../classes/order.php');

    $user = $_GET['user'];
        $userId = $_GET['id'];
        $orderId = $_GET['orderid'];

    if(isset($_POST['backToCart'])){
        
        header("Location: /vergara_midterm/view/view_cart.php?user=$user&id=$userId&orderid=$orderId");
       echo $orderId . 'yo';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Transaction</title>
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
        <form method="POST">
        <!-- <button type="submit" name="view_cart" id="viewcart">CART</button> -->
        <button type="submit" name="view_cart" style="background: none; border: none; cursor: pointer;">
            <i class="fas fa-shopping-cart" style="font-size: 30px; color: red;"></i>
        </button>
    </form>
    </div>
        <form method="POST">
        <button type="submit" name="backToCart">Back to Cart</button>
        </form>
            <h1>Payment Transaction</h1>

            <h4>Customer Details</h4>
            <form method="POST">
                <label for="customer_fn">First Name</label>
                <input type="text" name="customer_fn" required>
                <label for="customer_ln">Last Name</label>
                <input type="text" name="customer_ln" required>
                <label for="contactnum" required>Contact Number</label>
                <input type="number" name="contactnum">
                <label for="customer_name" required>Full Address</label>
                <input type="text" name="address">


            <h4>Choose payment method: </h4>
            <input type="radio" name="payment_method" value="gcash" id="gcash" onclick="togglePaymentFields('gcash')" required>
            <label for="gcash">GCash</label>
            <input type="text" id="gcash_number" name="gcash_number" placeholder="GCash Number" style="display:none;">
            
            <input type="radio" name="payment_method" value="cod" id="cod" onclick="togglePaymentFields('cod')">
            <label for="cod">Cash on Delivery</label>
            
            <input type="radio" name="payment_method" value="credit" id="credit" onclick="togglePaymentFields('credit')">
            <label for="credit">Credit Card</label>
            <input type="text" id="credit_number" name="credit_number" placeholder="Credit Card Number" style="display:none;">
                
                <button class="btn btn-warning" name="todelivery" type="submit">Submit</button>
                </form>

                <?php
                    if(isset($_POST['todelivery'])){
                        $o = new Order();
                        $amount = $o->getTotalAmount($orderId);
                        $first_name = $_POST['customer_fn'];
                        $last_name = $_POST['customer_ln'];
                        $contactnum = $_POST['contactnum'];
                        $address= $_POST['address'];

                        $paymentMethod = $_POST['payment_method'];
    
                        if ($paymentMethod == 'gcash' && !empty($_POST['gcash_number'])) {
                            $gcashNumber = $_POST['gcash_number'];
                            $pay = new GCash($amount, $gcashNumber);
                        } elseif ($paymentMethod == 'credit' && !empty($_POST['credit_number'])) {
                            $creditNumber = $_POST['credit_number'];
                            $pay = new CreditCard($amount, $creditNumber);
                        } elseif ($paymentMethod == 'cod') {
                            $pay = new CashOnDelivery($amount, $address);
                        } else {
                            echo "Please provide all required payment details.";
                            exit;
                        }
                        
                        $order = new Order();
                        $orderdeets = $order->setOrderDetails($orderId, $first_name, $last_name, $contactnum, $address);
                        header("Location: /vergara_midterm/view/delivery.php?user=$user&id=$userId&orderid=$orderId");
                    }
                ?>

    
</body>
<script>
function togglePaymentFields(paymentMethod) {
    document.getElementById('gcash_number').style.display = (paymentMethod === 'gcash') ? 'block' : 'none';
    document.getElementById('credit_number').style.display = (paymentMethod === 'credit') ? 'block' : 'none';
}

</script>
</html>