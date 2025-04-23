<?php

error_reporting(0);

session_start();

// connect to database 
$host = "localhost";
$user = "root";
$password = "";
$db = "schoolproject";

$data = mysqli_connect($host , $user , $password , $db);

if($data===false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql="select * from user where username='".$name."' AND password='".$pass."' ";

    $result = mysqli_query($data , $sql);

    $row = mysqli_fetch_array($result);

    if($row["usertype"] == "student")
    {

        $_SESSION['username'] =$name;
        $_SESSION['usertype'] ="student";
        header("location: studenthome.php");
    }

    
    elseif($row["usertype"] == "admin")
    {
        $_SESSION['username'] =$name;
        $_SESSION['usertype'] ="admin";
        header("location: adminhome.php");
    }

    else{

        $message =  "Invalid username or password";
        $_SESSION['loginMessage'] = $message;
        header("location:login.php");
        }

}

// <?
// //  Check Apache & PHP Error Logs
// // Enable error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// // Connect to database 
// $host = "localhost";
// $user = "root";
// $password = "";
// $db = "schoolproject";

// $data = mysqli_connect($host, $user, $password, $db);

// if (!$data) {
//     die("Database connection failed: " . mysqli_connect_error());
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['username'];
//     $pass = $_POST['password'];

//     // Use prepared statement to prevent SQL injection
//     $stmt = $data->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
//     $stmt->bind_param("ss", $name, $pass);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result && mysqli_num_rows($result) > 0) {
//         $row = mysqli_fetch_array($result);

//         if ($row["usertype"] == "student") {
//             header("Location: studenthome.php");
//             exit();
//         } elseif ($row["usertype"] == "admin") {
//             header("Location: adminhome.php");
//             exit();
//         }
//     } else {
//         echo "Invalid username or password";
//     }
// }



?>