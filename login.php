<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <title>Logga-in</title>
</head>
<body>
    <!--Nav bar section starts-->
    <div class="nav_bar">
        <section class="navigation">
            <div class="nav-container">
                <div class="nav_section">
                    <a href="#!">Fokus-ToDo-Lista</a>
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

     <!--Login container table starts-->
    <div class="container-2">
        <div class="box form-box">
            <?php 
                include("config.php");
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
                        header("Location: index.php");
                    }
                    }else{
           ?>

            <header> <h1> Logga-in <br></h1></header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">lösenord</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Login" required>
                    </div>

                    <div class="links">
                        <a href="register.php"> <h3>Skapa nytt konto </h3><br></a>
                        <p>För demo: <br>
                                användarenamn: admin@admin.se <br>
                                lösenord: admin123
                        </p>
                    </div>
                </form>
        </div>
        <?php } ?>
    </div>
    <!--Login container ends-->
</body>
</html>


