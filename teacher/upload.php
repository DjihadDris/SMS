<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check for errors during file upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        // Create the "uploads" folder if it doesn't exist
        $uploadDirectory = '../uploads/'.$_COOKIE['school_id'].'/lessons/';
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $tempPath = $file['tmp_name'];
        $uploadPath = $uploadDirectory . $file['name'];

        // Move the uploaded file to the desired location
        if (move_uploaded_file($tempPath, $uploadPath)) {
            // File upload successful
            $response = array('success' => true, 'message' => 'File uploaded successfully.', 'file' => $uploadPath, 'name' => $file['name']);
        } else {
            // Failed to move the uploaded file
            $response = array('success' => false, 'message' => 'Error moving uploaded file.');
        }
    } else {
        // Error during file upload
        $response = array('success' => false, 'message' => 'Error uploading file: ' . $file['error']);
    }
} else {
    // No file uploaded or invalid request
    $response = array('success' => false, 'message' => 'Invalid request.');
}

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>