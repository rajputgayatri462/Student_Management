<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header('location:login.php');
} elseif ($_SESSION['usertype'] == 'student') {
    header('location:login.php');
}



$host="localhost";
$user="root";
$password="";
$db="schoolproject";
$data = mysqli_connect($host, $user, $password, $db);

if($_GET['teacher_id'])
{
    $t_id = $_GET['teacher_id'];
    $sql="SELECT * FROM teacher WHERE id = '$t_id'  ";
    $result=mysqli_query($data,$sql);
    
    $info = $result->fetch_assoc();


    if(isset($_POST['update_teacher'])){
        $id=$_POST['id'];
        $t_name=$_POST['name'];
        $t_des=$_POST['description'];

        $file=$_FILES['image']['name'];

        $dst="./image/".$file;

        $dst_db="./image/".$file;

        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        if($file){
        $sql2= " UPDATE teacher SET name='$t_name',
        description='$t_des',
        image='$dst_db'
        WHERE id='$id' ";

        }

        else{
            $sql2= " UPDATE teacher SET name='$t_name',
            description='$t_des'
            WHERE id='$id' ";
        }
        $result2=mysqli_query($data, $sql2);

        if($result2){
            // header("location:");
            echo "update success";
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
    <title>Update</title>
    <!-- ========================CSS================= -->
    <?php

    include 'admin_css.php';

    ?>

<style>
    label{
        display:inline-block;
        width: 150px;
        /* text-align: right; */
        padding-top: 10px;
        padding-bottom: 10px;

    }
div{
    padding: 10px;
}
    .form_deg{
        width: 600px;
        /* padding-top: 70%; */
        /* padding-bottom: 70px; */
        /* text-align: right; */
    }
    textarea{
        text-align: left;
    }
</style>

</head>

<body>


    <?php

    include 'admin_sidebar.php';

    ?>


    <div class="content">
        <h1> Update</h1>

        <form action="#" method="POST" class="form_deg" enctype="multipart/form-data">

        <input type="text" value="<?php echo"{$info['name']}" ?>" name="id" hidden>
            <div>
                <label for="">Teacher Name</label>
                <input type="text" name="name"
                 value="<?php echo"{$info['name']}" ?> ">
            </div>

            <div>
                <label for="">About Teacher</label>
                <textarea name="description" rows="3">
                    <?php echo"{$info['description']}" ?>
                </textarea>
            </div>

            <div>
                <label for="">Teacher's old Image</label>
                <img src="<?php echo"{$info['image']}" ?>" width="100px" height="100px">
            </div>

            <div>
                <label for="">Choose New Image</label><br>
                <input type="file" name="image">
            </div>
<br>
            <div>
                <input type="submit" name="update_teacher" class="btn btn-success" >
            </div>

        </form>

    </div>


    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>