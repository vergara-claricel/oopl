<?php
include('../classes/connection.php');
include('../classes/paymentmethod.php');

if(isset($_POST['backToMenu'])){
    header('Location: /vergara_midterm/view/view_menu_items.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Transaction</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>


            <h1>Payment Transaction</h1>

            <h4>Customer Details</h4>
            <form action="POST">
                <label for="customer_name">Name</label>
                <input type="text" name="customer_name">
                <label for="customer_name">Full Address</label>
                <input type="text" name="address">
            </form>

            <h4>Choose payment method: </h4>

            <button onclick="showGcash()">GCash</button>
                <div id="gcash" style="display:none;">
                    <input type="number" name="gcash_number"> 
                </div>

            <button onclick="showCOD()">COD</button>
                <div id="cod" style="display:none;">
                 <input type="number" name="contact_number"> 
                </div>
            <button onclick="showCredit()">Credit Card</button>
                <div id="credit" style="display:none;">
                    <input type="number" name="credit_number"> 
                    
                    
                </div>
                <form method="POST">
                <button class="btn btn-warning" name="backToMenu" type="submit">Submit</button>
                </form>

    
</body>
<script>



    function showGcash(){
        document.getElementById('gcash').style.display = 'block';
        document.getElementById('cod').style.display = 'none';
        document.getElementById('credit').style.display = 'none';
    }
    function showCOD(){
        document.getElementById('cod').style.display = 'block';
        document.getElementById('credit').style.display = 'none';
        document.getElementById('gcash').style.display = 'none';
    }
    function showCredit(){
        document.getElementById('credit').style.display = 'block';
        document.getElementById('gcash').style.display = 'none';
        document.getElementById('cod').style.display = 'none';
    }

</script>
</html>