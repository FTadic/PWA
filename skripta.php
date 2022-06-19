<?php
    session_start(); 
    include 'connect.php';
    
    if (isset($_POST['prihvati']))
    {
        if (isset($_POST['title']) && isset($_POST['ksadrzaj']) && isset($_POST['content']) && isset($_POST['category']) && isset($_FILES['photo']))
        {
            $title = $_POST['title'];
            $ksadrzaj = $_POST['ksadrzaj'];
            $content = $_POST['content'];
            $photo = $_FILES['photo']['name'];
            $category = $_POST['category'];
            $datumObjave = date("d.m.Y");

            if (isset($_POST['archive']))
                $archive = 1;
            else
                $archive = 0;

            $target = 'img/' . $photo; 
            move_uploaded_file($_FILES['photo']['tmp_name'], "$target");

            $query = "INSERT INTO vijesti(datum, naslov, sazetak, tekst, slika, kategorija, arhiva)
            VALUES('$datumObjave', '$title', '$ksadrzaj', '$content', '$photo', '$category', '$archive');";

            $result = mysqli_query($dbc, $query);

            mysqli_close($dbc);
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
                                <li><a href="administracija.php">Administracija</a></li>
                            </ul>
                        </nav>
                        <h1>Frankfurter Algemeine</h1>
                    </header>
                    <div class="wrapper2">
                        <h2>
                            <?php
                                echo "$title";
                            ?>
                        </h2>
                        <p class="time"><small>
                            <?php
                                echo "Updated $datumObjave";
                            ?>
                        </small></p>
                    </div>
            
                    <img src="<?php echo $target?>" alt="politicar drzi govor">
                        
                    <section>
                        <div class="wrapper2">
                            <p><strong><?php echo $ksadrzaj ?></strong></p>
                            <br>
                            <p class="subhead"><?php echo $content ?></p>
                        </div>
                    </section>
                </div>
                <footer>
                    <h2>Frankfurter Algemeine</h2>
                    <p>&copy; Filip Tadić 0246094331</p>
                </footer>
            </body>
            </html>
            <?php
        }
        else
            echo "Unesite sav sadržaj";
    }
?>
