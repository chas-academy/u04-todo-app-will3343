<?php 
    include_once('config.php');
    include_once('database.php');
?>

<!doctype html>
<html lang="sv">
    <head>
        <title>Fokus-ToDo-Lista</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        <link rel="stylesheet" href="./css/main.css">
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
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="#!">Logga in</a>
                                </li>
                                <li>
                                    <a href="login.php">Logga ut</a>
                                </li>
                            </ul>
                    </nav>
                </div>
            </section>
        </div>
        <!--Nav bar section ends-->

        <!-- Container table starts -->
        <div class="container">
            <form action="process.php" method="POST">
                <div class="todo-table">
                    <h1>Mina Anteckningar</h1>
                    <h6> 
                        <?php 
                            $sql = "SELECT * FROM todos";
                            $result = mysqli_query($db,$sql);
                            $todos = mysqli_fetch_all($result);
                            $total = count($todos);
                            $complete = 0;
                            //mysqli_bind_param()
                                foreach($todos as $todo){
                                    if($todo[2]==true){
                                        $complete++;
                                    }
                                }
                            echo $total." Total, ".$complete." Complete,".($total-$complete)." Pending.";
                        ?>
                    </h6>
                        <div class="btn-holder">
                            <a href="add-todo.html" class="btn btn-primary"><i class="fa fa-plus"></i> + Lägg till </a>
                            <button name="action" value="edit" class="btn btn-secondary"><i class="fa fa-edit"></i> Uppdatera</button>
                            <button name="action" value="delete" class="btn btn-danger"><i class="fa fa-times"></i> Ta-bort</button>
                            <button name="action" value="complete" class="btn btn-purple"><i class="fa fa-thumbs-up"></i> Markera klart</button>
                            <button name="action" value="pending" class="btn btn-orange"><i class="fa fa-thumbs-down"></i> Markera avvaktan</button>
                        </div>

                    <p style="margin-top: 10px;"> 
                        <?php if(!empty($_GET['error'])) echo "Error : ".$_GET['error']; ?>
                        <?php if(!empty($_GET['success'])) echo "Success : ".$_GET['success']; ?> 
                    </p>
                    <table>
                        <thead>
                            <tr>
                                <th>#.nr</th>
                                <th>Att-göra(R)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($todos as $todo){
                            ?>
                            <tr class="<?php echo $todo[2]?'complete':''; ?>">
                                <td><input  type="radio" required name="todo" value="<?php echo $todo[0]; ?>" id=""></td>
                                <td><?php echo $todo[1]; ?></td>
                                <td><?php echo $todo[2]?'Complete':'Pending'; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <!-- Container table ends -->
      
         <!-- place footer here -->
        <footer id="footer">
            <div class="container-1">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-3 column">
                        <h4 class="headerfooter">Information</h4>
                            <ul class="nav">
                                <li><a href="#"><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>20 Main St
                                        <br>
                                                <i class="hiddenfa fa fa-map-marker fa-2x" aria-hidden="true"></i>Bla Bla Bla
                                        <br>
                                                <i class="hiddenfa fa fa-map-marker fa-2x" aria-hidden="true"></i>Bla Bla 
                                        <br>        
                                    </a>
                                </li>
                                <li><i class="fa fa-phone fa-2x" aria-hidden="true"></i> 022546584</li> 
                                <li><a href="#"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i> bla@gmail.com</a></li> 
                            </ul>
                    </div>
                    <div class="col-xs-6 col-md-3 column">
                        <h4 class="headerfooter">Chas Academy <br> U04-Uppgift-To-DO-List-APP</h4>
                            <ul class="nav">
                                <li><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2024</li>
                            </ul>
                    </div>
                </div>
                <!--/row-->
            </div>
        </footer>
        <!-- footer ends here -->

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    </body>
</html>
