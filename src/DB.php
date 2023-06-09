<?php

namespace App\Models;

use \PDO;

class DB
{
    private $host = 'localhost';
    private $user = 'neel';
    private $pass = 'home1234';
    private $dbname = 'slimDB';

    public function connect()
    {
        $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
        $conn = new PDO($conn_str, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}

?>