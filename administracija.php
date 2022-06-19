<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="administracija.css">
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

        <?php
            session_start();
            include 'connect.php'; 
            define('UPLPATH', 'img/');

            if ($_SESSION['$username'])
                echo '<div class="wrapper"><p class="u_p">Dobro došli ' . $_SESSION['$username'] . '</p></div>';
            else    
                header("Location: prijava.php");
            
            echo '<div class="wrapper"><a href="logout.php" class="odjava">Odjava</a></div>';

            $query = "SELECT * FROM vijesti";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result))
            {
                echo '
                <div class="wrapper">
                <form enctype="multipart/form-data" action="" method="POST">
                    <div class="form-item">
                        <label for="title">Naslov vjesti:</label>
                        <div class="form-field">
                            <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'">
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (do 50 znakova):</label>
                        <div class="form-field">
                            <textarea name="ksadrzaj" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
                        </div>
                    </div>
                    <div class="form-item"> <label for="pphoto">Slika:</label>
                        <div class="form-field">
                            <input type="file" class="input-text" id="pphoto" value="'.$row['slika'].'" name="photo" /> <br>
                            <img src="' . UPLPATH . $row['slika'] . '" width=100px>
                        </div>
                    </div>
                    <div class="form-item">
                        <label for="category">Kategorija vijesti:</label>
                        <div class="form-field">
                            <select name="category" id="" class="form-field-textual" value="'.$row['kategorija'].'">
                                <option value="sport">Sport</option>
                                <option value="kultura">Kultura</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-item">
                        <label>Spremiti u arhivu:
                            <div class="form-field">'; 
                            if($row['arhiva'] == 0) 
                            { 
                                echo '<input type="checkbox" name="archive"
                                    id="archive" /> Arhiviraj?'; 
                            } 
                            else 
                            { 
                                echo '<input type="checkbox" name="archive" id="archive"
                                    checked /> Arhiviraj?'; 
                            } 
                            echo '</div>
                        </label>
                    </div>
                    <div class="form-item">
                        <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                        <button type="reset" value="Poništi" name="ponisti">Poništi</button>
                        <button type="submit" name="prihvati" value="Prihvati"> Izmjeni</button>
                        <button type="submit" name="ponisti" value="Izbriši"> Izbriši</button>
                    </div>
                </form>
            </div>
                ';
            }

            if (isset($_POST['ponisti']))
            { 
                $id=$_POST['id']; 
                $query = "DELETE FROM vijesti WHERE id=$id "; 
                
                $result = mysqli_query($dbc, $query); 
            }

            if(isset($_POST['prihvati']))
            { 
                $title = $_POST['title'];
                $ksadrzaj = $_POST['ksadrzaj'];
                $content = $_POST['content'];
                $photo = $_FILES['photo']['name'];
                $category = $_POST['category']; 
                
                if (isset($_POST['archive']))
                    $archive = 1;
                else
                    $archive = 0;

                $target = 'img/'.$photo; 
                move_uploaded_file($_FILES['photo']['tmp_name'], "$target");
                
                $id=$_POST['id']; 
                
                $query = "UPDATE vijesti SET naslov='$title', sazetak='$ksadrzaj', tekst='$content', slika='$photo', kategorija='$category', arhiva='$archive' WHERE id=$id;"; 
                
                $result = mysqli_query($dbc, $query); 
            }
        ?>
    </div>
    <footer>
        <h2>Frankfurter Algemeine</h2>
        <p>&copy; Filip Tadić 0246094331</p>
    </footer>
</body>

</html>