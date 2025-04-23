<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php');
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
</head>

<body>


<?php

include 'admin_sidebar.php';

?>


<div class="content">
    <h1> Student Management System</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nihil magni quo? Numquam, nisi placeat tenetur vel facere laudantium quod, error enim quis fugiat nemo necessitatibus aliquid, facilis et aliquam.</p>
</div>


    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>