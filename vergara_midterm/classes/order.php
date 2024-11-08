<?php 

include('connection.php');
$GLOBALS['connection'] = $connection;



class Order{
    private $konek;
    function __construct()
    {
        $this->konek = $GLOBALS['connection'];
    }

    public function processTransaction(){
        $data = $this->konek->query('SELECT * FROM WHERE  1')->fetchAll();
        return $data;
    }

    
}




?>