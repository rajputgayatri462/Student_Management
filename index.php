<?php
error_reporting(0);
session_start();
session_destroy();

if($_SESSION['message']){
    $message = $_SESSION['message'];
    echo "<script type = 'text/javascript'> 
    alert('$message');
    </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <!-- CSS FILE  -->
    <link rel="stylesheet" type="text/css" href="i.css">

    <!-- BOOTSTARPE LINK  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
">

    <!-- FONT AWESOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>

    <nav>
        <label class="logo">W-school</label>
        <ul>
            <li><a href="" class="link">Home</a></li>
            <li><a href="contact.php" class="link">Contact</a></li>
            <li><a href="#admission" class="link">Admission</a></li>
            <li><a href="login.php" class="link"><i class="fa-solid fa-user "></i></a></li>
            <!-- <li><a href="">Login</a></li> -->
        </ul>
    </nav>

    <div class="section1">

        <!-- img -->
        <!-- <img class="main_img" src="school.png" > -->
        <img class="main_img" src="./assets/school.jpg">

        <h1 class="img_text">&nbsp;"Excellence in Education,
            Excellence in Life."</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="./assets/playground.jpg">
            </div>

            <div class="col-md-8">

                <h1> Welcome to W University</h1>
                <p>
                    “ W-College – A Hub of Excellence in Education

                    W College is a prestigious institution dedicated to providing high-quality education and fostering intellectual growth. Established in [2011], the college has consistently been at the forefront of academic excellence, offering a wide range of undergraduate and postgraduate programs in various fields such as Science, Arts, Commerce, Engineering, and Management.

                    With a highly experienced faculty, state-of-the-art infrastructure, and a student-centric approach, W-College ensures that learners receive a holistic education. The campus is equipped with modern laboratories, a well-stocked library, smart classrooms, and sports facilities, creating an ideal environment for both academic and extracurricular activities.

                    W-College emphasizes research, innovation, and practical learning, ensuring that students are industry-ready. The institution maintains strong collaborations with leading companies and organizations, offering internship opportunities and placement support through its dedicated Career Guidance Cell.

                    Apart from academics, the college promotes cultural and social engagement through various clubs, student societies, and events, encouraging students to develop leadership and teamwork skills. With a strong commitment to excellence, W-College continues to shape future leaders, thinkers, and professionals who contribute positively to society.”</p>
            </div>


        </div>
    </div>

    <!-- <div class="center">
    <h1> UG Programs </h1>
</div> -->

    <!-- <div class="container ">
    <div class="row">
        <div class="col-md-4">
             <img class="welcome_img" src="it.jpg">
        </div>

        <div class="col-md-4">
             <img class="welcome_img" src="bcs.jpg">
        </div>

        <div class="col-md-4">
             <img class="welcome_img" src="animation.jpg">
        </div>

        <div class="col-md-4">
             <img class="welcome_img" src="robotics.jpg">
        </div>
        <div class="col-md-4">
             <img class="welcome_img" src="digitalm.jpg">
        </div>

        <div class="col-md-4">
             <img class="welcome_img" src="cs.jpg">
        </div>
    </div>
</div> -->

    <div class="container1 ">

        <center style="font-size: 30px; font-weight: 600; padding: 20px; "> UG Programs</center>
        <!-- <div class="title">
            <h1>UG Programs</h1>
        </div> -->

        <div class="vendor-list">

            <div>

                <div class="vendor-row">
                    <img src="./assets/it.jpg" alt="">
                    <div class="info">
                        <h2>Bsc(Hons)</h2>
                        <p>Information Technology</p>
                        <!-- <h3>Rs.2.5-4 lakhs</h3> -->
                        <button class="book-btn">Explore</button>
                    </div>
                </div>
                <h5>Bsc(hons)Information Technology</h3>
            </div>

            <div>
                <div class="vendor-row">
                    <img src="./assets/cs.jpg" alt="">
                    <div class="info">
                        <h2>Bcs(Hons)</h2>
                        <p>Computer Science</p>
                        <!-- <h3>Rs.80,000-30 lakhs</h3> -->
                        <button class="book-btn">Explore</button>
                    </div>
                </div>
                <h5>Bsc(hons)Computer Science</h5>
            </div>


            <div>
                <div class="vendor-row">
                    <img src="./assets/bcs.jpg" alt="">
                    <div class="info">
                        <h2>BCA</h2>
                        <p>Computer Application</p>
                        <!-- <h3>Rs.80,000-30 lakhs</h3> -->
                        <button class="book-btn">Explore</button>
                    </div>
                </div>
                <h5>Bsc(hons)Computer Application</h5>
            </div>

            <div>
                <div class="vendor-row">
                    <img src="./assets/animation.jpg" alt="">
                    <div class="info">
                        <h2>Bsc(Hons)</h2>
                        <p>Animation</p>
                        <!-- <h3>Rs.80,000-30 lakhs</h3> -->
                        <button class="book-btn">Explore</button>
                    </div>
                </div>
                <h5>Bsc(hons)Animation</h5>
            </div>

            <div>
                <div class="vendor-row">
                    <img src="./assets/robotics.jpg" alt="">
                    <div class="info">
                        <h2>Bcs(Hons)</h2>
                        <p>Robotics</p>
                        <!-- <h3>Rs.80,000-30 lakhs</h3> -->
                        <button class="book-btn">Explore</button>
                    </div>
                </div>
                <h5>Bsc(hons)Robotics</h5>
            </div>

            <div>
                <div class="vendor-row">
                    <img src="./assets/digitalm.jpg" alt="">
                    <div class="info">
                        <h2>Bcs(Hons)</h2>
                        <p>Digital Marketing</p>
                        <!-- <h3>Rs.80,000-30 lakhs</h3> -->
                        <button class="book-btn">Explore</button>
                    </div>
                </div>
                <h5>Bsc(hons)Digital Marketing</h5>
            </div>

        </div>
    </div>


<div></div>    
    <center class="center1">
    <h1>Enquiry Form</h1>
</center>

<div  class="admission_form" id="admission">

    <form action="data_check.php" method="POST">
        <div class="adm_int">
            <label class="label_text">Name</label>
            <input class="input_deg" type="text" style="padding: 7px; margin: 3px;" name="name" required>
        </div>

        <div class="adm_int">
            <label class="label_text">Email</label>
            <input class="input_deg" type="text" style="padding: 7px; margin: 3px;" name="email" required>
        </div>

        <div class="adm_int">
            <label class="label_text">MobileNo</label>
            <input class="input_deg" style="padding: 7px; margin: 3px;" type="text" pattern="\d{10}" maxlength="10" name="mobileno" required>
        </div>

        <div class="adm_int">
            <label class="label_text">Address</label>
            <input class="input_deg" type="text" style="padding: 7px; margin: 3px;" name="address" required>
        </div>

        <div class="adm_int">
            <input class="btn btn-primary" type="submit" id="submit" name="apply">
        </div>

    </form>


</div>

<footer>
    <h2 class="footer">All @copyright reserved</h2>
</footer>



    <!-- BOOTSTAPE JS CDN  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>