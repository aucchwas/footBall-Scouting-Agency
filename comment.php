<?php
require 'connect.php'; // Include the database connection file

session_start(); // Start a new session or resume the existing one

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $userCaptcha = $_POST['captcha']; // Get the user's CAPTCHA input

    // Check if the user's CAPTCHA input matches the CAPTCHA string stored in the session
    if ($userCaptcha !== $_SESSION['captcha']) {
        echo "div class='error'>Invalid CAPTCHA</div>"; // Display an error message if the CAPTCHA is invalid
        header('Location: index.php'); // Redirect the user to the index page
        exit; // Terminate the current script
    } else {
        // Check if the request method is POST and if an ID is set in the GET parameters
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
            $id = $_GET['id']; // Get the ID from the GET parameters
            // Filter the user's comment input to remove any special characters
            $normal_comment = filter_input(INPUT_POST, 'normal_comment', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            // Prepare an SQL query to update the comment in the database
            $query = "UPDATE other_info SET normal_comment = :normal_comment WHERE id = :id";
            $statement = $db->prepare($query);

            // Bind the user's comment and the ID to the SQL query
            $statement->bindValue(':normal_comment', $normal_comment);
            $statement->bindValue(':id', $id, PDO::PARAM_INT);

            $statement->execute(); // Execute the SQL query

            header('Location: index.php'); // Redirect the user to the index page
            exit; // Terminate the current script
        }
    }
}
?>