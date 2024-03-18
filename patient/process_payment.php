<?php

  //import database
  include("../connection.php");


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cardNumber = $_POST['card-number'];
    $expiryDate = $_POST['expiry-date'];
    $cvv = $_POST['cvv'];
    $name = $_POST['name'];

    // Perform database connection (replace with your actual database credentials)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "abclabs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the 'payment' table
    $sql = "INSERT INTO payment (card_number, expiry_date, cvv, name) 
            VALUES ('$cardNumber', '$expiryDate', '$cvv', '$name')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment details added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
