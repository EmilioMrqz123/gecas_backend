<?php
// models/Auto.php
class Auto {
    private $collection;

    // Propiedades del Auto (deben coincidir con lo que espera Android)
    public $marca;
    public $modelo;
    public $precio;
    public $anio;
    public $foto_url;
    public $stock;

    // Constructor recibe la conexión y selecciona la colección 'autos'
    public function __construct($db) {
        $this->collection = $db->selectCollection('autos');
    }

    // --- MÉTODO LEER (GET) ---
    public function leer() {
        // Busca todos los documentos. Puedes agregar filtros aquí si quieres.
        $cursor = $this->collection->find([], ['sort' => ['marca' => 1]]);
        return $cursor;
    }

    // --- MÉTODO CREAR (POST) ---
    public function crear() {
        // Sanitizar datos (Limpiar etiquetas HTML para seguridad)
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->precio = (double)$this->precio;
        $this->stock = (int)$this->stock;

        $documento = [
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'precio' => $this->precio,
            'anio' => $this->anio,
            'foto_url' => $this->foto_url,
            'stock' => $this->stock,
            'fecha_registro' => new MongoDB\BSON\UTCDateTime()
        ];

        $resultado = $this->collection->insertOne($documento);

        if($resultado->getInsertedCount() > 0) {
            return true;
        }
        return false;
    }
}
?>