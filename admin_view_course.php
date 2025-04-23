<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username']) || $_SESSION['usertype'] == 'student') {
    header('location:login.php');
}

$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Delete course if requested
if (isset($_GET['course_id'])) {
    $course_id = $_GET['course_id'];
    $del_sql = "DELETE FROM course WHERE id='$course_id'";
    mysqli_query($data, $del_sql);
    header('location:admin_view_course.php');
}

$sql = "SELECT * FROM course";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Courses</title>
    <?php include 'admin_css.php'; ?>
    <style>
        table, th, td {
            border: 1px solid black;
        }

        .table_th, .table_td {
            padding: 15px;
        }
    </style>
</head>
<body>
<?php include 'admin_sidebar.php'; ?>
<div class="content">
    <h2>Course List</h2>
    <a href="admin_add_course.php" class="btn btn-primary">Add New Course</a><br><br>
    <table>
        <tr>
            <th class="table_th">Course Name</th>
            <th class="table_th">Description</th>
            <th class="table_th">Update</th>
            <th class="table_th">Delete</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td class="table_td"><?php echo $row['course_name']; ?></td>
                <td class="table_td"><?php echo $row['course_description']; ?></td>
                <td class="table_td">
                <a href='admin_update_course.php?course_id=<?php echo $row["id"]; ?>' class='btn btn-primary'>Update</a>

                </td>
                <td class="table_td">
                    <a href="admin_view_course.php?course_id=<?php echo $row['id']; ?>" 
                       onclick="return confirm('Are you sure to delete this course?')" 
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
