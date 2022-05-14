<?php

namespace db;

use mysqli;

class ConexionDB
{
    private $servidorDB = "localhost:3307";
    private $nombreDB = "estudiantes_db;"
    private $usuarioDB = "root";
    private $passwordDB = "";

    private $conn = null;

    public function __construct(){
        $this->conn = new mysqli($this->servidorDB, $this->usuarioDB, $this->passwordDB, $this->nombreDB);
    }

    public function getResultQuery($sql){
        return $this->conn->query($sql);
    }

    public function close(){
        $this->conn->close();
    }
}