<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'products';

    // Properties
    public $id;
    public $name;
    public $details;
    public $price;
    

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get categories
    public function read() {
      // Create query
      $query = 'SELECT
        id,
        name,
        details,
        price
       
      FROM
        ' . $this->table . '
      ORDER BY
        name DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
 }