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

$id=$_GET['student_id'];
$sql ="SELECT * FROM user WHERE Id='$id' ";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();



if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query ="UPDATE user SET username='$name' , email ='$email' , phone = '$phone' , password = '$password' WHERE id='$id' ";

    $result2=mysqli_query($data , $query);

    if($result2){
    header("location:view_student.php");
    }


}
?>

<!-- ================================================ -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <!-- ========================CSS================= -->

    <?php

    include 'admin_css.php';

    ?>
    <style>
       label{
        display: inline-block;
        width: 100px;
        text-align: right;
        padding-top: 10px;
        padding-bottom: 10px;
       }
.button{
    text-align: center;
    margin-top: 20px;
    margin-left: 100px;
}
       

    </style>
</head>

<body>

    <?php

    include 'admin_sidebar.php';

    ?>

    <div class="content">
        <h1>Update Student</h1>

        <div>
            <form action="#" method="POST">
                <div class="div_deg">
                    <label for="">Username</label>
                    <input type="text"  name="name" 
                    value="<?php echo "{$info['username']}";?>">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="email" class="input" name="email" value="<?php echo "{$info['email']}";?>">
                </div>
                <div>
                    <label for="">phone</label>
                    <input type="tel" class="input" name="phone" 
                    value="<?php echo "{$info['phone']}";?>">
                </div>
                <div>
                    <label for="">password</label>
                    <input type="text" class="input" name="password"
                    value="<?php echo "{$info['password']}" ;?>">
                </div>
                <div>
                    <input class="btn btn-success button" type="Submit" name="update" value="Update">
                </div>
            </form>
        </div>
    </div>





    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>