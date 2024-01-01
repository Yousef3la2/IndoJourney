<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="style/signup.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300&family=Playfair+Display&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/ff1b5eea17.js" crossorigin="anonymous"></script>
        <title>Register</title>
    </head>

    <body>
        <div class="container">
            <div class="main-box">
            <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button>";
         

         }

         }else{
         
        ?>
                <h2>Sign Up</h2>
                </br>
                <form action="" method="post">
                    <div class="input-box">
                        <span class="icon"><i class="fa-solid fa-user"></i></box-icon></span>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                        <label for="username">Username</label>
                    </div>
                    </br>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></box-icon></span>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                        <label for="email">Email</label>
                    </div>
                    </br>
                    <div class="input-box">
                    <span class="icon"><i class="fa-solid fa-input-numeric"></i></box-icon></span>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                    <label for="age">Age</label>
                    </div>
                    </br>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></box-icon></span>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                        <label for="password">Password</label>
                    </div>
                    </br>
                    

                <div class="field">
                <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
                
                </form>
            </div>
            <?php } ?>
        </div>
    </body>
</html>