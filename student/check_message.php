<?php
include('../db.php');

// Retrieve the user's message from the request
$message = $_POST['message'];
$school_id = $_COOKIE['school_id'];

// Query the database for declined words
$query = "SELECT word FROM declined_words WHERE school_id='$school_id' AND LOWER(?) LIKE CONCAT('%', LOWER(word), '%')";
$statement = $conn->prepare($query);
$statement->bind_param('s', $message);
$statement->execute();

// Bind the result to a variable
$statement->bind_result($word);

// Fetch the declined words into an array
$declinedWords = array();
while ($statement->fetch()) {
    $declinedWords[] = $word;
}

// Check if any declined words were found
$hasDeclinedWords = !empty($declinedWords);

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode(['hasDeclinedWords' => $hasDeclinedWords, 'declinedWords' => $declinedWords]);

// Close the statement and database connection
$statement->close();
$conn->close();
?>