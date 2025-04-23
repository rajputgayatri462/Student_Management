<?php
// Start the session
session_start();

// Turn off error reporting (not recommended for production)
error_reporting(0);

// Check if user is not logged in or is a student, then redirect to login page
if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php');
}

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Fetch all teacher records from the database
$sql = "SELECT * FROM teacher";
$result = mysqli_query($data, $sql);

// Check if a teacher_id is passed through the URL to delete a teacher
if ($_GET['teacher_id']) {
    $t_id = $_GET['teacher_id'];

    // Delete the teacher with the given ID
    $sql2 = "DELETE FROM teacher WHERE id='$t_id' ";
    $result2 = mysqli_query($data, $sql2);

    // If deletion is successful, refresh the page
    if ($result2) {
        header('location:admin_view_teacher.php');
    }
}
?>

<!-- HTML Starts Here -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>

    <!-- Include Admin CSS -->
    <?php include 'admin_css.php'; ?>

    <!-- Custom Styling for Table -->
    <style>
        table th, td {
            border: 1px solid black;
        }

        .table_th {
            padding: 20px;
            font-size: 20px;
        }

        .table_td {
            padding: 20px;
            font-size: 20px;
        }
    </style>
</head>

<body>

    <!-- Include Sidebar for Admin Navigation -->
    <?php include 'admin_sidebar.php'; ?>

    <!-- Main Content Section -->
    <div class="content">
        <h3>View Teacher's Data</h3>

        <!-- Table to Display Teachers -->
        <table>
            <tr>
                <th class="table_th">Teacher Name</th>
                <th class="table_th">About Teacher</th>
                <th class="table_th">Image</th>
                <th class="table_th">Delete</th>
                <th class="table_th">Update</th>
            </tr>

            <?php
            // Loop through all teacher records
            while ($info = $result->fetch_assoc()) {
            ?>
                <tr>
                    <!-- Display Teacher Name -->
                    <td class="table_td"><?php echo $info['name']; ?></td>

                    <!-- Display Teacher Description -->
                    <td class="table_td"><?php echo $info['description']; ?></td>

                    <!-- Display Teacher Image -->
                    <td class="table_td">
                        <img src="<?php echo $info['image']; ?>" width="100px" height="100px">
                    </td>

                    <!-- Delete Button -->
                    <td class="table_td">
                        <a onClick="return confirm('Are you Sure to Delete This :')" class="btn btn-danger" href='admin_view_teacher.php?teacher_id=<?php echo $info["Id"]; ?>'>
                            Delete
                        </a>
                    </td>

                    <!-- Update Button -->
                    <td class="table_td">
                        <a href='admin_update_teacher.php?teacher_id=<?php echo $info["Id"]; ?>' class='btn btn-primary'>
                            Update
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
