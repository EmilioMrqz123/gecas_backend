<?php
// config/Database.php
require_once __DIR__ . '/../vendor/autoload.php'; // Cargar librería de Mongo

class Database {
    // Cambiar esto si usan MongoDB Atlas (Nube)
    private $host = "mongodb://localhost:27017";
    private $db_name = "gecas_pos";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $client = new MongoDB\Client($this->host);
            $this->conn = $client->selectDatabase($this->db_name);
        } catch(Exception $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>