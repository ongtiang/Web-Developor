<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'messages';

    // Properties
    public $id;
    public $name;
    public $message;
    

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
        message
       
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