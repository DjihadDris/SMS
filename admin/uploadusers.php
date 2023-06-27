<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// Function to generate random code
function generateCode($length) {
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $randomString = "";
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["excel_file"]) && $_FILES["excel_file"]["error"] == UPLOAD_ERR_OK) {
        // Get the file details
        $fileTmpPath = $_FILES["excel_file"]["tmp_name"];
        $fileName = $_FILES["excel_file"]["name"];

        // Check the file extension
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = array("xls", "xlsx");

        if (in_array($fileExtension, $allowedExtensions)) {

            // Load the Excel file
            $excel = IOFactory::load($fileTmpPath);

            // Get the first worksheet
            $worksheet = $excel->getActiveSheet();

            // Get the highest row and column
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();

            include('../db.php');

            // Insert data into the table
            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $worksheet->rangeToArray("A$row:$highestColumn$row", NULL, TRUE, FALSE);

                if($_COOKIE['user_type'] == "superadmins" AND $_COOKIE['id'] == 1){
                $rowSchool = $rowData[0][6]; // Assuming 'school_id' is in index 6
                $rowType = $rowData[0][7]; // Assuming 'type' is in index 7
                $rowVal = $rowData[0][8]; // Assuming 'val' is in index 8
                }else{
                $rowSchool = $_COOKIE['school_id'];
                $rowType = "admins"; // Assuming 'type' is in index 6
                $rowVal = $rowData[0][6]; // Assuming 'val' is in index 7
                }

                // Generate random code
                $code = generateCode(10);

                // Prepare the insert query
                $insertQuery = "INSERT INTO $rowType (name, fn, dob, gender, email, pn, password, school_id, val) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $statement = $conn->prepare($insertQuery);

                // Bind parameters and execute the query
                $statement->bind_param(
                    'sssssssss',
                    $rowData[0][1], // Assuming 'name' is in index 1
                    $rowData[0][0], // Assuming 'fn' is in index 0
                    $rowData[0][2], // Assuming 'dob' is in index 2
                    $rowData[0][3], // Assuming 'gender' is in index 3
                    $rowData[0][4], // Assuming 'email' is in index 4
                    $rowData[0][5], // Assuming 'pn' is in the index 5
                    $code, // Set the generated code
                    $rowSchool,
                    $rowVal
                );
                $statement->execute();

                $statement->close();
            }

            header('Location: users?true');

            $conn->close();
        } else {
            header('Location: users?false=format');
        }
    } else {
        header('Location: users?false=error');
    }
}else{
    header('Location: teachers');
}
?>