<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="style/login.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300&family=Playfair+Display&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ff1b5eea17.js" crossorigin="anonymous"></script>
        <title>Login</title>
    </head>

    <body>
        <div class="container">
            <div class="main-box">
                <?php 
             
                include("php/config.php");
                if(isset($_POST['submit'])){
                  $email = mysqli_real_escape_string($con,$_POST['email']);
                  $password = mysqli_real_escape_string($con,$_POST['password']);
  
                  $result = mysqli_query($con,"SELECT * FROM users WHERE Email='$email' AND Password='$password' ") or die("Select Error");
                  $row = mysqli_fetch_assoc($result);
  
                  if(is_array($row) && !empty($row)){
                      $_SESSION['valid'] = $row['Email'];
                      $_SESSION['username'] = $row['Username'];
                      $_SESSION['age'] = $row['Age'];
                      $_SESSION['id'] = $row['Id'];
                  }else{
                      echo "<div class='message'>
                        <p>Wrong Username or Password</p>
                         </div> <br>";
                     echo "<a href='login.php'><button class='btn'>Go Back</button>";
           
                  }
                  if(isset($_SESSION['valid'])){
                      header("Location: book.php");
                  }
                }else{
  
              
              ?>
                <h1>Log In</h1>
                </br>
                <form action="" method="post">
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></box-icon></span>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                        <label for="email">Email</label>
                    </div>
                    </br>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></box-icon></span>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                        <label for="password">Password</label>
                    </div>
                    </br>
                    <div class="check">
                        <label for="rm"><input type="checkbox" id="rm">Remember Me</label>
                        <a href="#">Forget Password</a>
                    </div>

                <div class="field">
                
                <input type="submit" class="btn" name="submit" value="Login" required>
                </div>

                    <div class="register">
                        Don't have account? <a href="register.php">Sign Up Now</a>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>