<?php 

include('connection.php');
$GLOBALS['connection'] = $connection;



class Order{
    private $konek;
    function __construct()
    {
        $this->konek = $GLOBALS['connection'];
    }

    function viewOrder($orderid){
        $order = $this->konek->query("SELECT * FROM `cart` WHERE order_id = $orderid")->fetch_all(MYSQLI_ASSOC);
        return $order;
    }

    function setOrderDetails($orderid, $first_name, $last_name, $contact_num, $address){
        $details = $this->konek->query("UPDATE `orders` SET `first_name`='$first_name',`last_name`='$last_name',`contact_num`='$contact_num',`address`='$address' WHERE order_id = $orderid");
        return $details;
    }

    function getTotalAmount($orderid){
        $tot = $this->konek->query("SELECT `totalamount` FROM `orders` WHERE order_id = $orderid ");
        return $tot;
    }


    
}




?>