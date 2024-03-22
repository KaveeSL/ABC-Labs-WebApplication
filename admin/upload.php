<?php
// Import database
include("../connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve the email address and patient ID from the form
    $email = $_POST['email'];
    // If you have a patient ID field in your form, uncomment the line below
    // $pid = $_POST['pid'];

    // Check if a file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        // Define the directory to which the file will be uploaded
        $targetDir = "uploads/";

        // Create the directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generate a unique filename to prevent overwriting existing files
        $filename = uniqid() . '_' . basename($_FILES["fileToUpload"]["name"]);

        // Set the path of the uploaded file
        $targetFile = $targetDir . $filename;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            // File uploaded successfully
            // Update the database to store information about the uploaded file and its association with the patient
            // Example SQL query (replace it with your actual database update query)
            // If you have a patient ID field in your form, uncomment the line below
            // $sql = "INSERT INTO files (pid, email, filename, filepath) VALUES ('$pid', '$email', '$filename', '$targetFile')";
            $sql = "INSERT INTO files (email, filename, filepath) VALUES ('$email', '$filename', '$targetFile')";

            // Execute the query (replace $database with your database connection object)
            $result = $database->query($sql);

            if ($result) {
                // Database update successful
                echo "File uploaded successfully and associated with email address: $email.";
            } else {
                // Database update failed
                echo "Error: Unable to associate file with email address $email.";
            }
        } else {
            // Failed to move the uploaded file
            echo "Error: Unable to upload file.";
        }
    } else {
        // No file uploaded or an error occurred during upload
        echo "Error: No file uploaded or an error occurred during upload.";
    }
} else {
    // Form was not submitted or 'submit' parameter is missing
    echo "Error: Form was not submitted.";
}
?>
