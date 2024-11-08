<?php
require_once('connection.php');
$GLOBALS['konek'] = $connection;


class Cart {
    private $db;

    function __construct(){
        $this->db = $GLOBALS['konek'];
    }


    function viewCart(){
        $cart = $this->db->query('SELECT * FROM `cart` WHERE order_id = 2')->fetchAll();
        return $cart;
    }

}
?>