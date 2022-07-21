<?php
  class Category {
    // DB Stuff
    private $conn;
    private $table = 'users';

    // Properties
    public $id;
    public $name;
    

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
        email
       
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
