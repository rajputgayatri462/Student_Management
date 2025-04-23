<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "schoolproject";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">📘 Student Management System Dashboard</h2>

    <div class="row">
        <!-- Total Students -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Students</div>
                <div class="card-body">
                    <?php
                    $student_result = $conn->query("SELECT COUNT(*) AS total_students FROM students");
                    $student_count = $student_result->fetch_assoc();
                    ?>
                    <h3 class="card-title"><?= $student_count['total_students'] ?></h3>
                </div>
            </div>
        </div>

        <!-- Total Courses (Optional: only if you have a courses table) -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Courses</div>
                <div class="card-body">
                    <?php
                    $course_result = $conn->query("SELECT COUNT(DISTINCT course) AS total_courses FROM students");
                    $course_count = $course_result->fetch_assoc();
                    ?>
                    <h3 class="card-title"><?= $course_count['total_courses'] ?></h3>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="col-md-4 d-flex flex-column gap-3">
            <a href="add_student.php" class="btn btn-outline-primary btn-lg">➕ Add Student</a>
            <a href="students.php" class="btn btn-outline-dark btn-lg">📋 View Students</a>
        </div>
    </div>
</div>
</body>
</html>
