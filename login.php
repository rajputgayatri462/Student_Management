<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

      <!-- CSS FILE  -->
      <link rel="stylesheet" type="text/css" href="login.css">

      <!-- BOOTSTARPE LINK  -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
  ">
  
      <!-- FONT AWESOME LINK -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

    <section>
        <div class="login-container">
            <h2>Login
                <h4>
                    <?php  

                    error_reporting(0);
                    // session_start();
                    echo $_SESSION['loginMessage'];
                  ?>
                  </h4>
            </h2>
            <form action="login_check.php" method="post" class="login_form">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>

    </section>
    
</body>
</html>