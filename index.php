<?php
    session_start(); 
    include 'connect.php'; 
    define('UPLPATH', 'img/'); 
?> 
<!-- <section class="sport">  -->
    <?php 
        // $query = "SELECT * FROM vijesti 
        // WHERE arhiva=0 AND kategorija='sport' LIMIT 3"; 
        
        // $result = mysqli_query($dbc, $query); 
        
        // $i=0; 
        // while($row = mysqli_fetch_array($result)) 
        // { 
        //     echo '<article class="politics-article">'; 
        //     echo '<a href="article1">'; 
        //     echo '<img src="' . UPLPATH . $row['slika'] . '"';
        //     echo '<h2>' . $row['naslov'] . '</h2>';
        //     echo '<p>' . $row['content'] . '</p>';
        //     echo '<p class="time">' . $row['datum'] . '</p>';
        //     echo '</a>';
        //     echo '</article>';
            // echo '<article class="politics-article">'; 
            // echo '<a href="article1">'; 
            // echo '<img src="' . UPLPATH . $row['slika'] . '"';
            // echo '<h2>' . $row['naslov'] . '</h2>';
            // echo '<div class="sport_img">'; 
            // echo '</div>'; 
            // echo '<div class="media_body">'; 
            // echo '<h4 class="title">'; 
            // echo '<a href="clanak.php?id='.$row['id'].'">'; 
            // echo $row['naslov']; 
            // echo '</a></h4>'; 
            // echo '</div></div>'; 
            // echo '</article>'; 
        // }
    ?> 
<!-- </section> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css">
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
            <!-- <article class="politics-article">
                <a href="article1.html">
                    <img src="img/politicar.jpg" alt="politicar">
                    <h3>TV duel za europski val</h3>
                    <h2>Predsjednik održao govor</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia tempora impedit a, voluptatem rem, odit esse iure obcaecati totam recusandae nam vero delectus nostrum, dolores veniam aspernatur doloribus excepturi pariatur reprehenderit possimus! Quas quaerat quos et itaque error molestiae reprehenderit?</p>
                    <p class="time"><small>prije 2 sata <i class="fa-solid fa-star icon"></i> 5</small></p>
                </a>
            </article>
            <article class="politics-article">
                <a href="article2.html">
                    <img src="img/politicari.jpg" alt="politicari">
                    <h3>Više novaca za studente</h3>
                    <h2>Ministri imali sastanak</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia tempora impedit a, voluptatem rem, odit esse iure obcaecati totam recusandae nam vero delectus nostrum, dolores veniam aspernatur doloribus excepturi pariatur reprehenderit possimus! Quas quaerat quos et itaque error molestiae reprehenderit?</p>
                    <p class="time"><small>prije 2 sata <i class="fa-solid fa-star icon"></i> 1</small></p>
                </a>
            </article>
            <article class="politics-article">
                <a href="article3.html">
                    <img src="img/sabor.jpg" alt="sabor">
                    <h3>Rat u Ukrajini</h3>
                    <h2>Rusija napala ukrajinu</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia tempora impedit a, voluptatem rem, odit esse iure obcaecati totam recusandae nam vero delectus nostrum, dolores veniam aspernatur doloribus excepturi pariatur reprehenderit possimus! Quas quaerat quos et itaque error molestiae reprehenderit?</p>
                    <p class="time"><small><i class="fa-solid fa-star icon"></i> 1</small></p>
                </a>
            </article> -->

            <?php 
                $query = "SELECT * FROM vijesti 
                WHERE arhiva=0 AND kategorija='kultura' LIMIT 3"; 
                
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
                    // echo '<article class="politics-article">'; 
                    // echo '<a href="article1">'; 
                    // echo '<img src="' . UPLPATH . $row['slika'] . '"';
                    // echo '<h2>' . $row['naslov'] . '</h2>';
                    // echo '<div class="sport_img">'; 
                    // echo '</div>'; 
                    // echo '<div class="media_body">'; 
                    // echo '<h4 class="title">'; 
                    // echo '<a href="clanak.php?id='.$row['id'].'">'; 
                    // echo $row['naslov']; 
                    // echo '</a></h4>'; 
                    // echo '</div></div>'; 
                    // echo '</article>'; 
                }
            ?>
        </section>
        <section class="politics">
            <div class="kategorija">
                <h2>Sport</h2>
            </div>
            <!-- <article class="politics-article">
                <a href="article4.html">
                    <img src="img/biciklizam.jpg" alt="biciklizam">
                    <h3>Otvorena sezona biciklizma</h3>
                    <h2>Biciklizam postaje sve popularniji</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad fuga, iusto voluptatibus enim cupiditate sint suscipit iure quo, assumenda veritatis et maxime incidunt molestiae aliquid officia repellendus! Ea aliquid distinctio corrupti saepe suscipit delectus, autem exercitationem. Inventore incidunt reiciendis corrupti!</p>
                    <p class="time"><small>prije 2 sata</small></p>
                </a>
            </article>
            <article class="politics-article">
                <a href="article5.html">
                    <img src="img/odbojka.jpg" alt="odbojka">
                    <h3>Odbojka postaje sve popularnija</h3>
                    <h2>Odbojka u top 5 najpopularnijih sportova</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad fuga, iusto voluptatibus enim cupiditate sint suscipit iure quo, assumenda veritatis et maxime incidunt molestiae aliquid officia repellendus! Ea aliquid distinctio corrupti saepe suscipit delectus, autem exercitationem. Inventore incidunt reiciendis corrupti!</p>
                    <p class="time"><small>prije 2 sata <i class="fa-solid fa-star icon"></i> 1</small></p>
                </a>
            </article>
            <article class="politics-article">
                <a href="article6.html">
                    <img src="img/teretana.jpg" alt="teretana">
                    <h3>Sve više ljudi krenulo u teretanu</h3>
                    <h2>Teretane opet otvorene</h2>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad fuga, iusto voluptatibus enim cupiditate sint suscipit iure quo, assumenda veritatis et maxime incidunt molestiae aliquid officia repellendus! Ea aliquid distinctio corrupti saepe suscipit delectus, autem exercitationem. Inventore incidunt reiciendis corrupti!</p>
                    <p class="time"><small><i class="fa-solid fa-star icon"></i> 1</small></p>
                </a>
            </article> -->
            <?php 
                $query = "SELECT * FROM vijesti 
                WHERE arhiva=0 AND kategorija='sport' LIMIT 3"; 
                
                $result = mysqli_query($dbc, $query); 
                 
                while($row = mysqli_fetch_array($result)) 
                { 
                    echo '<article class="politics-article">'; 
                    echo '<a href="clanak.php?id='.$row['id'].'">'; 
                    echo '<img src="' . UPLPATH . $row['slika'] . '">';
                    echo '<h2>' . $row['naslov'] . '</h2>';
                    echo '<p>' . $row['tekst'] . '</p>';
                    echo '<p class="time">' . $row['datum'] . '</p>';
                    echo '</a>';
                    echo '</article>';
                    // echo '<article class="politics-article">'; 
                    // echo '<a href="article1">'; 
                    // echo '<img src="' . UPLPATH . $row['slika'] . '"';
                    // echo '<h2>' . $row['naslov'] . '</h2>';
                    // echo '<div class="sport_img">'; 
                    // echo '</div>'; 
                    // echo '<div class="media_body">'; 
                    // echo '<h4 class="title">'; 
                    // echo '<a href="clanak.php?id='.$row['id'].'">'; 
                    // echo $row['naslov']; 
                    // echo '</a></h4>'; 
                    // echo '</div></div>'; 
                    // echo '</article>'; 
                }
            ?>
        </section>
    </div>
    <footer>
        <h2>News</h2>
        <p>&copy; Filip Tadić 0246094331</p>
    </footer>
</body>
</html>