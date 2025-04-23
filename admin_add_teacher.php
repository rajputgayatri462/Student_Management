<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php');
}


$host ="localhost";
$user ="root";
$password="";
$dbname = "schoolproject";
$data = mysqli_connect($host, $user, $password, $dbname);

if(isset($_POST['add_teacher'])){

    $t_name = $_POST['name'];

    $t_description = $_POST['description'];

    $file = $_FILES['image']['name'];

    $dst="./image/".$file;

    $dst_db="image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'],$dst);

    $sql="INSERT INTO teacher (name, description,image) VALUES ('$t_name','$t_description','$dst_db')";


    $result = mysqli_query($data,$sql);

    if($result){
        header('location:admin_add_teacher.php');
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
    .div_deg{
        padding-top: 70px;
        padding-bottom: 70px;
    }
</style>



</head>

<body>


<?php

include 'admin_sidebar.php';

?>


<div class="content">
    <h1> Add Teacher</h1>
    <div class="div_deg">
        <form action="#" method="POST" enctype="multipart/form-data">
            <br>
            <div>
                <label for="">Teacher Name :</label>
                <input type="text" name="name">
            </div>
            <br>
            <div>
                <label for="">Description  &nbsp;&nbsp;&nbsp; : </label>
                <textarea name="description" id=""></textarea>
            </div>
            <br>
            <div>
                <label for="">Image &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</label>
                <input type="file" name="image">
            </div>
            <br>
            <div>
                <input type="submit" name="add_teacher" value="Add Teacher" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>


    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>