<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php');
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['course_name'];
    $desc = $_POST['course_description'];

    $sql = "INSERT INTO course (course_name, course_description) VALUES ('$name', '$desc')";

    if (mysqli_query($data, $sql)) {
        echo "<script>alert('Course added successfully');</script>";
    } else {
        echo "Error: " . mysqli_error($data);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <?php include 'admin_css.php'; ?>
</head>
<body>
<?php include 'admin_sidebar.php'; ?>
<div class="content">
    <h2>Add New Course</h2>
    <form action="" method="POST">
        <label>Course Name</label><br>
        <input type="text" name="course_name" required><br><br>
        <label>Description</label><br>
        <textarea name="course_description" rows="4" required></textarea><br><br>
        <input type="submit" value="Add Course" class="btn btn-success" nam>
    </form>
</div>
</body>
</html>
