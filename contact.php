<?php
// Start session and DB connection
session_start();
error_reporting(0);

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        // Redirect to home page after successful submission
        header("Location: index.php?message=success");
        exit();
    } else {
        $error = "Something went wrong. Please try again.";
    }
    
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <?php include 'admin_css.php'; ?>
    <style>
        .contact-container {
            padding: 40px;
            max-width: 600px;
            margin: auto;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php include 'admin_sidebar.php'; ?>

    <div class="content">
        <div class="contact-container">
            <h2>Contact Us</h2>

            <?php if ($success) echo "<p style='color: green;'>$success</p>"; ?>
            <?php if ($error) echo "<p style='color: red;'>$error</p>"; ?>

            <form method="POST" action="">
                <label>Name:</label><br>
                <input type="text" name="name" required><br>

                <label>Email:</label><br>
                <input type="email" name="email" required><br>

                <label>Subject:</label><br>
                <input type="text" name="subject" required><br>

                <label>Message:</label><br>
                <textarea name="message" rows="5" required></textarea><br>

                <input type="submit" value="Send Message" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>

</html>
