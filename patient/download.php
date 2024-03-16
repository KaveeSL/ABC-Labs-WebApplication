<?php
// Include database connection
include("../connection.php");

// Check if file_id is provided as a query parameter
if (isset($_GET['file_id'])) {
    $fileId = $_GET['file_id'];

    // Retrieve file information from the database
    $sql = "SELECT filename, filepath FROM files WHERE id = ?";
    $stmt = $database->prepare($sql);
    if (!$stmt) {
        die("Error preparing statement: " . $database->error);
    }
    $stmt->bind_param("i", $fileId);
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $filename = $row['filename'];
        $filepath = $row['filepath'];

        // Set headers to force download
        header('Content-Type: application/pdf');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $filename . "\"");
        
        // Read the file and output its contents
        readfile($filepath);
        exit;
    } else {
        // File not found in the database
        echo "File not found.";
    }
} else {
    // file_id parameter is missing
    echo "File ID is missing.";
}
?>
