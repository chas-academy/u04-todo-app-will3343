<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Register</title>
</head>
<body>

     <!--Nav bar section starts-->
    <div class="nav_bar">
        <section class="navigation">
            <div class="nav-container">
                <div class="nav_section">
                    <a href="index.php">Fokus-ToDo-Lista</a>
                </div>
                <nav>
                    <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
                        <ul class="nav-list">
                            <li>
                                <a href="#!">Home</a>
                            </li>
                            <li>
                                <a href="#!">Logga in</a>
                            </li>
                            <li>
                                <a href="#!">Logga ut</a>
                            </li>
                        </ul>
                </nav>
            </div>
        </section>
    </div>
    <!--Nav bar section ends-->
    <!--registration container starts-->
    <div class="container3">
        <div class="box form-box">
            <?php 
                include("config.php");
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
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Gå Tillbaka</button>";
                    }
                    else{
                        mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");
                        echo "<div class='message'>
                              <p>Registration successfully!</p>
                              </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Logga-in Nu</button>";
                    }
                    }else{
                ?>
                
            <header><h1> Registrera dig</h1><br></header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="username">Användarenamn</label>
                        <input type="text" name="username" id="username" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="age">ålder</label>
                        <input type="number" name="age" id="age" autocomplete="off" required>
                    </div>
                    <div class="field input">
                        <label for="password">lösenord</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="login.php">Logga-in</a>
                    </div>
                </form>
        </div>
        <?php } ?>
    </div>
    <!--registration container ends-->
</body>
</html>