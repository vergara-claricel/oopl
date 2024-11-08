<?php

require_once('connection.php');
$GLOBALS['connection'] = $connection;

class MenuItems{
    private $db;

    function __construct(){
        $this->db = $GLOBALS['connection'];
    }

    function viewMenu(){
        $menu_items = $this->db->query('SELECT * FROM menu WHERE 1')->fetchAll();
        return $menu_items;
    }

}

?>