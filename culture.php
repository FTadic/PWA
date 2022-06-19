<?php
    session_start(); 
    include 'connect.php'; 
    define('UPLPATH', 'img/'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="culture.css">
    <title>News</title>
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
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>
            <h1>News</h1>
        </header>
        <section class="politics">
            <div class="kategorija">
                <h2>Kultura</h2>
            </div>

            <?php 
                $query = "SELECT * FROM vijesti 
                WHERE arhiva=0 AND kategorija='kultura';"; 
                
                $result = mysqli_query($dbc, $query); 
                 
                while($row = mysqli_fetch_array($result)) 
                { 
                    echo '<article class="politics-article">'; 
                    echo '<a href="clanak.php?id=' . $row['id'] . '">'; 
                    echo '<img src="' . UPLPATH . $row['slika'] . '">';
                    echo '<h2>' . $row['naslov'] . '</h2>';
                    echo '<p>' . $row['tekst'] . '</p>';
                    echo '<p class="time">' . $row['datum'] . '</p>';
                    echo '</a>';
                    echo '</article>';
                }
            ?>
        </section>
        <!-- <section class="politics">
            <div class="kategorija">
                <h2>Sport</h2>
            </div>
            <?php 
                // $query = "SELECT * FROM vijesti 
                // WHERE arhiva=0 AND kategorija='sport' LIMIT 3"; 
                
                // $result = mysqli_query($dbc, $query); 
                 
                // while($row = mysqli_fetch_array($result)) 
                // { 
                //     echo '<article class="politics-article">'; 
                //     echo '<a href="clanak.php?id='.$row['id'].'">'; 
                //     echo '<img src="' . UPLPATH . $row['slika'] . '">';
                //     echo '<h2>' . $row['naslov'] . '</h2>';
                //     echo '<p>' . $row['tekst'] . '</p>';
                //     echo '<p class="time">' . $row['datum'] . '</p>';
                //     echo '</a>';
                //     echo '</article>';
                // }
            ?>
        </section> -->
    </div>
    <footer>
        <h2>News</h2>
        <p>&copy; Filip Tadić 0246094331</p>
    </footer>
</body>
</html>