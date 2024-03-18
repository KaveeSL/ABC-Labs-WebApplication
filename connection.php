<?php

// Define the Database class
class Database {
    // Private properties for database connection details
    private $host = "localhost"; // Encapsulation (Data Hiding)
    private $username = "root"; // Encapsulation (Data Hiding)
    private $password = ""; // Encapsulation (Data Hiding)
    private $database = "abclabs"; // Encapsulation (Data Hiding)
    private $connection; // Encapsulation (Data Hiding)

    // Constructor to establish database connection (Constructor)
    public function __construct() {
        // Create a new mysqli connection
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database); // Abstraction (Dependency Injection)
        
        // Check if connection is successful
        if ($this->connection->connect_error) { // Encapsulation
            // Print error message and terminate script
            die("Connection failed: " . $this->connection->connect_error); // Abstraction
        }
    }

    // Function to execute a query (Encapsulation)
    public function query($sql) {
        return $this->connection->query($sql); // Abstraction
    }

    // Function to prepare a statement (Encapsulation)
    public function prepare($sql) {
        return $this->connection->prepare($sql); // Abstraction
    }

    // Function to get the connection object (Encapsulation)
    public function getConnection() {
        return $this->connection; // Abstraction
    }

    // Destructor to close database connection (Destructor)
    public function __destruct() {
        $this->connection->close(); // Abstraction
    }
}

// Usage example
$database = new Database(); // Abstraction (Instantiation)
$connection = $database->getConnection(); // Abstraction (Instantiation)

?>
