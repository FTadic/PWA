<?php
    session_start(); 
    include 'connect.php'; 
    define('UPLPATH', 'img/'); 

    $id = $_GET['id'];

    $query = "SELECT * FROM vijesti
              WHERE id = '$id';";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="article.css">
    <title>Frankfurter Algemeine</title>
</head>
<body>
    <div class="wrapper">
        <header>
            <nav>
                <ul class="nav-list">
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="culture.php">Kultura</a></li>
                    <li><a href="sport.php">Sport</a></li>
                    <li><a href="unos.php">Unos</a></li>
                    <li><a href="administracija.php">Administration</a></li>
                </ul>
            </nav>
            <h1>Frankfurter Algemeine</h1>
        </header>
        <div class="wrapper2">
            <h2>
                <?php
                    echo $row['naslov'];
                ?>  
            </h2>
            <p class="time"><small>Updated: <?php echo $row['datum'] ?></small></p>
        </div>

        <?php
            echo '<img src="' . UPLPATH . $row['slika'] . '">';
        ?>
            
        <section>
            <div class="wrapper2">
                <p>
                    <strong>
                        <?php
                            echo $row['sazetak'];
                        ?>
                    </strong>
                </p>
                <p>
                    <?php
                        echo $row['tekst'];
                    ?>
                </p>
            </div>
        </section>
    </div>
    <footer>
        <h2>Frankfurter Algemeine</h2>
        <p>&copy; Filip Tadić 0246094331</p>
    </footer>
</body>
</html>