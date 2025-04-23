<?php
session_start();

if(!isset($_SESSION['username'])){
    header('location:login.php');
}
elseif($_SESSION['usertype']=='admin'){
    header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ========================CSS================= -->
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }


        /* HEADER CSS */
        .header {
            background-color: rgb(172, 110, 110);
            padding-left: 30px;
            line-height: 70px;
        }

        .header  a {
            text-decoration: none ;
            color: white;
            font-weight: bold;
        }
        .header  a:hover {
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
            padding-bottom:30px ;
            font-size: 15px;
        }
        ul li a {
            color: white;
            font-weight: bold;
            text-decoration: none;
        }
        ul li a:hover{
            color: black;
        }
        .content{
            margin-left: 25%;
            margin-top: 5%;
        }


        /* DIV CSS */


    </style>

    <!-- BOOTSTARPE LINK  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">
</head>

<body>

   <?php
   
   include "student_sidebar.php";

   ?>




    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>