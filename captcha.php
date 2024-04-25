<?php
session_start(); // Start a new session or resume the existing one

// Generate a random CAPTCHA string.
$captcha = '';
for ($i = 0; $i < 5; $i++) {
    $captcha .= chr(rand(97, 122)); // Generate a random lowercase letter and append it to the CAPTCHA string
}

// Store the CAPTCHA string in a session variable.
$_SESSION['captcha'] = $captcha; // This will be used to validate the user's input

// Create a 100x30 image
$im = imagecreatetruecolor(100, 30); // This will be the canvas for our CAPTCHA image

// Set the background color to white
$bg = imagecolorallocate($im, 255, 255, 255); // Allocate a color for an image

// Set the text color to black
$fg = imagecolorallocate($im, 0, 0, 0); // Allocate a color for an image

// Fill the background
imagefill($im, 0, 0, $bg); // Perform a flood fill

// Write the CAPTCHA string on the image
imagestring($im, 5, 5, 5, $captcha, $fg); // Draw a string horizontally

// Output the image
header("Cache-Control: no-cache, must-revalidate"); // Send a raw HTTP header to prevent caching
header('Content-type: image/png'); // Send a raw HTTP header to set the content type

imagepng($im); // Output a PNG image to either the browser or a file
imagedestroy($im); // Free any memory associated with the image
?>