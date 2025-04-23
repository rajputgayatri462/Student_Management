<?php
session_start();

// Check if user is logged in as a student
if (!isset($_SESSION['username']) || $_SESSION['usertype'] != 'student') {
    header('location:login.php');
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

// Get student details from the database
$username = $_SESSION['username'];
$sql = "SELECT * FROM students WHERE username='$username'";
$result = mysqli_query($data, $sql);
$student = mysqli_fetch_assoc($result);

// Get the student's enrolled courses
$sql_courses = "SELECT * FROM courses WHERE student_id='{$student['id']}'";
$courses_result = mysqli_query($data, $sql_courses);

// Get the student's attendance data
$sql_attendance = "SELECT * FROM attendance WHERE student_id='{$student['id']}'";
$attendance_result = mysqli_query($data, $sql_attendance);

// Get the student's grades
$sql_grades = "SELECT * FROM grades WHERE student_id='{$student['id']}'";
$grades_result = mysqli_query($data, $sql_grades);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Add CSS file -->
    <link rel="stylesheet" href="admin_css.php">
    <style>
        .dashboard {
            padding: 20px;
        }

        .card {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .card h3 {
            margin-bottom: 15px;
        }

        .table th, .table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- Navigation menu -->
    <?php include 'student_sidebar.php'; ?>

    <div class="dashboard">
        <h1>Welcome, <?php echo $student['name']; ?>!</h1>

        <!-- Personal Information Section -->
        <div class="card">
            <h3>Your Profile</h3>
            <p><strong>Name:</strong> <?php echo $student['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
            <p><strong>Enrollment Year:</strong> <?php echo $student['enrollment_year']; ?></p>
        </div>

        <!-- Courses Section -->
        <div class="card">
            <h3>Enrolled Courses</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Professor</th>
                        <th>Schedule</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($course = mysqli_fetch_assoc($courses_result)) { ?>
                        <tr>
                            <td><?php echo $course['course_name']; ?></td>
                            <td><?php echo $course['professor']; ?></td>
                            <td><?php echo $course['schedule']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Attendance Section -->
        <div class="card">
            <h3>Attendance</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Days Attended</th>
                        <th>Total Classes</th>
                        <th>Attendance Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($attendance = mysqli_fetch_assoc($attendance_result)) { ?>
                        <tr>
                            <td><?php echo $attendance['course_name']; ?></td>
                            <td><?php echo $attendance['days_attended']; ?></td>
                            <td><?php echo $attendance['total_classes']; ?></td>
                            <td><?php echo round(($attendance['days_attended'] / $attendance['total_classes']) * 100, 2); ?>%</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Grades Section -->
        <div class="card">
            <h3>Your Grades</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($grade = mysqli_fetch_assoc($grades_result)) { ?>
                        <tr>
                            <td><?php echo $grade['course_name']; ?></td>
                            <td><?php echo $grade['grade']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Contact Us Button -->
        <div class="card">
            <a href="student_contact.php" class="btn">Contact Us</a>
        </div>
    </div>

</body>

</html>
