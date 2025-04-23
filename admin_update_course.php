<?php
session_start();
error_reporting(0);

// Check if admin is logged in
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {
    header('location:login.php');
    exit();
}

// DB Connection
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Get course ID
$course_id = $_GET['course_id'];

// Get course details
$course_query = "SELECT * FROM course WHERE id='$course_id'";
$course_result = mysqli_query($data, $course_query);
$course_data = mysqli_fetch_assoc($course_result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['course_name'];
    $desc = $_POST['course_description'];

    $update_query = "UPDATE course SET course_name='$name', course_description='$desc' WHERE id='$course_id'";
    $update_result = mysqli_query($data, $update_query);

    if ($update_result) {
        echo "<script>alert('Course updated successfully'); window.location.href='admin_view_course.php';</script>";
        exit();
    } else {
        echo "<script>alert('Update failed. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Course</title>
    <?php include 'admin_css.php'; ?>
</head>

<body>
    <?php include 'admin_sidebar.php'; ?>

    <div class="content" style="padding: 20px;">
        <h2>Update Course</h2>
        <form method="POST">
            <label>Course Name:</label><br>
            <input type="text" name="course_name" value="<?php echo $course_data['course_name']; ?>" required><br><br>

            <label>Course Description:</label><br>
            <textarea name="course_description" rows="4" required><?php echo $course_data['course_description']; ?></textarea><br><br>

            <input type="submit" value="Update Course" class="btn btn-primary">
        </form>
    </div>
</body>

</html>
