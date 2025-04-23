<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php'); 
}


$host="localhost";
$user="root";
$password="";
$db="schoolproject";

$data=mysqli_connect($host , $user , $password , $db);

$sql= "SELECT *  from admission";
$result = mysqli_query($data, $sql);
$row = mysqli_fetch_assoc($result);
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
        tr, th, td {
  padding: 8px;
  text-align: left;
  border: 1px solid black;
}
    </style>
</head>

<body>

    <?php

    include 'admin_sidebar.php';

    ?>


    <div class="content">
        <h1>Enquiry For Admission</h1>
        <br><br>
        <table  >
            <tr>
                <th style="padding: 20px; font-size:15px;">Name</th>
                <th style="padding: 20px; font-size:15px;">Email</th>
                <th style="padding: 20px; font-size:15px;">PhoneNo</th>
                <th style="padding: 20px; font-size:15px;">Address</th>
            </tr>


            <?php
            while($info=$result->fetch_assoc())
            {
            ?>

            <tr>
                <td style="padding: 20px;">
                    <?php echo "{$info['name']}"; ?>
                </td>
                <td style="padding: 20px;">
                <?php echo "{$info['email']}"; ?>

                </td>
                <td style="padding: 20px;">
                <?php echo "{$info['mobileno']}"; ?>

                </td>
                <td style="padding: 20px;">
                <?php echo "{$info['address']}"; ?>

                </td>
            </tr>

            <?php

            }
            ?>

        </table>
    </div>


    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>