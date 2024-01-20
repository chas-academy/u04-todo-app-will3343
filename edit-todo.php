<?php 
    include_once('config.php');
    include_once('database.php');

    if(empty($_GET['id'])){
        header('Location: index.php?error=Select atleast one todo');
    }
        $sql = "SELECT * FROM todos WHERE `id` = ".$_GET['id'];
        $result = mysqli_query($db,$sql);
        $data = mysqli_fetch_assoc($result);
    
?>

<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Todo App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
    <!--edit table start-->
    <div class="container">
        <form action="process.php" method="POST">
            <div class="todo-table">
                <h1>Uppdatera Task</h1>
                <div class="form-elements">
                    <input type="text" name="title" required value="<?php echo $data['title']; ?>" placeholder="Type your todo here...">
                </div>
                    <input type="hidden" name="action" value="edited">
                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                    <button class="btn btn-purple"><i class="fa fa-save"></i> Spara </button>
                    <a href="index.html" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Tillbaka </a>
            </div>
        </form>
    </div>
    <!--edit table ends-->
</body>
</html>