<?php
session_start();

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
if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = 'student';


    $check = "SELECT * FROM user WHERE username = '$username' ";

    $check_user = mysqli_query($data, $check);

    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        // echo "Username already exists !!";
        echo "<script type='text/javascript'>
            alert('User Already Exists !!');
        </script>";
    } 
    else {

        $sql = "INSERT INTO user(username, email, phone, usertype, password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";

        $result = mysqli_query($data, $sql);

        if ($result) {
            // echo "Data Uploaded Successfully";
            echo "<script type='text/javascript'>
            alert('Data Upload Successfully');
        </script>";
        } else {
            echo "Upload Failedd";
        }
    }
}
?>

<!-- ================================================ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ========================CSS================= -->
    <?php

    include 'admin_css.php';

    ?>
    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .div_deg {
            padding-top: 70px;
            padding-bottom: 70px;
        }

        .button {
            margin-top: 20px;
            display: flex;
            margin-left: 100px;
        }
    </style>
</head>

<body>


    <?php

    include 'admin_sidebar.php';

    ?>


    <div class="content">
        <h1> Add Student </h1>

        <div class="div_deg">
            <form action="#" method="POST">
                <div>

                    <label for="name">UserName : </label>
                    <input type="text" id="name" name="name" required><br>
                </div>

                <div>

                    <label for="name">PhoneNo : </label>
                    <input type="number" id="name" name="phone" required><br>
                </div>
                <div>

                    <label for="name">Email : </label>
                    <input type="email" id="name" name="email" required><br>
                </div>
                <div>

                    <label for="name">Password : </label>
                    <input type="text" id="password" name="password" required><br>
                </div>

                <div>
                    <input type="Submit" class="btn btn-primary button" name="add_student" value="Add Student">
                </div>

            </form>
        </div>
    </div>


    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>