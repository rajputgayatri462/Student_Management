<?php
session_start();
error_reporting(0);

// Redirect if user is not logged in or is a student
if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {
    header('location:login.php');
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Fetch courses
$sql = "SELECT * FROM course";
$result = mysqli_query($data, $sql);

// Handle delete request
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $delete_sql = "DELETE FROM course WHERE id='$course_id'";
    $delete_result = mysqli_query($data, $delete_sql);

    if ($delete_result) {
        header('location:admin_view_course.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Courses</title>
    <?php include 'admin_css.php'; ?>
    <style>
        table th, td {
            border: 1px solid black;
        }

        .table_th, .table_td {
            padding: 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

<?php include 'admin_sidebar.php'; ?>

<div class="content">
    <h3>View Course List</h3>

    <table>
        <tr>
            <th class="table_th">Course Name</th>
            <th class="table_th">Description</th>
            <th class="table_th">Delete</th>
            <th class="table_th">Update</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td class="table_td"><?php echo $row['course_name']; ?></td>
                <td class="table_td"><?php echo $row['course_description']; ?></td>
                <td class="table_td">
                    <a onclick="return confirm('Are you sure to delete this course?')" class="btn btn-danger"
                       href="admin_view_course.php?course_id=<?php echo $row['id']; ?>">
                        Delete
                    </a>
                </td>
                <td class="table_td">
                    <a class="btn btn-primary" href="admin_update_course.php?course_id=<?php echo $row['id']; ?>">
                        Update
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>

</body>
</html>
