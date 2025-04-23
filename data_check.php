<?php


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

if(isset($_POST['apply'])){
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_mobileno = $_POST['mobileno'];
    $data_address = $_POST['address'];
    
    $sql = "INSERT INTO  admission(name , email, mobileno, address) VALUE('$data_name' , '$data_email' , '$data_mobileno' , '$data_address')";

    $result = mysqli_query($data, $sql);
    if($result){
        $_SESSION['message']= "Request Sent Successfully";
        header('location: index.php');
        }
        else{
            echo " Request Denied!!";
        }


}


?>