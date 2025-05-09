<?php
require_once 'includes/functions.php';
require_once 'includes/db.php';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

    if ($name && $email && $message) {
        // Insert data into the database
        $stmt = $pdo->prepare("INSERT INTO enquiries (name, email, message) VALUES (?, ?, ?)");
        if ($stmt->execute([$name, $email, $message])) {
            // Prepare email
            $to = 'vivekmorya014@gmail.com'; // Change to the admin email
            $subject = 'New Inquiry Received';
            $body = "You have received a new inquiry:\n\nName: $name\nEmail: $email\nMessage: $message";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Optional CSS -->
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h2>Contact Us</h2>
        <?php if (!empty($success)): ?>
            <p class="success"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <div>
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Message</label>
                <textarea name="message" required></textarea>
            </div>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
