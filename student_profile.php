<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'admin') {
    header('location:login.php');
}

// Connect to the database 
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host, $user, $password, $db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($data, $sql);
$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $sql = "UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username='$name'";
    $result2 = mysqli_query($data, $sql);
    if ($result2) {
        header('location:student_profile.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        .header {
            background-color: rgb(172, 110, 110);
            padding-left: 30px;
            line-height: 70px;
        }

        .header a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .header a:hover {
            color: rgb(40, 7, 7);
        }

        .logout {
            float: right;
            padding-right: 30px;
        }

        ul {
            background-color: #424a5b;
            width: 16%;
            height: 100%;
            position: fixed;
            padding-top: 5%;
            text-align: center;
        }

        ul li {
            list-style: none;
            padding-bottom: 30px;
            font-size: 15px;
        }

        ul li a {
            color: white;
            font-weight: bold;
            text-decoration: none;
        }

        ul li a:hover {
            color: black;
        }

        .content {
            margin-left: 25%;
            margin-top: 5%;
        }

        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        h1 {
            padding-left: 38px;
        }

        #button {
            padding: 10px;
            padding-left: 105px;
        }

        .profile-info {
            margin-top: 20px;
        }

        .profile-info div {
            margin-bottom: 15px;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>

    <?php
    include "student_sidebar.php";
    ?>

    <div class="content">
        <h1>Student Profile</h1>

        <div class="profile-info">
            <div><strong>Name:</strong> <?php echo $info['username']; ?></div>
            <div><strong>Email:</strong> <?php echo $info['email']; ?></div>
            <div><strong>Phone:</strong> <?php echo $info['phone']; ?></div>
        </div>

        <h2>Update Profile</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="<?php echo $info['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $info['phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="<?php echo $info['password']; ?>" required>
            </div>
            <div id="button">
                <input type="submit" name="update_profile" class="btn btn-primary" value="Update Profile">
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
