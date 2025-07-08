<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

    // Validate required fields
    if ($name && $email && $phone && $message) {
        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO enquiries (name, email, phone, message) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$name, $email, $phone, $message])) {
            // Prepare email
            $to = 'vivekmorya014@gmail.com'; // Change to the admin email
            $subject = 'New Inquiry Received';
            $body = "You have received a new inquiry:\n\nName: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            // Send email
            if (mail($to, $subject, $body, $headers)) {
                $success = "Thank you for your message! We'll get back to you soon.";
            } else {
                $success = "Failed to send the email notification. Please try again later.";
            }
        } else {
            $success = "Something went wrong. Please try again.";
        }
    } else {
        $success = "All fields are required.";
    }
}
?>