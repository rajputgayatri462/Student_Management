<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'admin') {
    header('location:login.php');
}

// Connect to database
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Fetch all courses
$sql = "SELECT * FROM course";
$result = mysqli_query($data, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Available Courses</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .content {
            margin-left: 18%;
            margin-top: 5%;
            padding: 20px;
        }

        .table-container {
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        td, th {
            text-align: center;
        }
    </style>
</head>
<body>

<?php include "student_sidebar.php"; ?>

<div class="content">
    <div class="table-container">
        <h2>Available Courses</h2>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Course Name</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($course = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $course['id']; ?></td>
                        <td><?php echo $course['course_name']; ?></td> <!-- Ensure 'name' exists in your DB -->
                        <td><?php echo $course['course_description']; ?></td> <!-- Ensure 'description' exists in your DB -->
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
