<?php 
    session_start(); 
    include 'connect.php'; 

    // Putanja do direktorija sa slikama 
    define('UPLPATH', 'img/'); 

    // Provjera da li je korisnik došao s login forme 
    if (isset($_POST['prijava'])) 
    { 
        // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona 
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $prijavaImeKorisnika = $_POST['username']; 
            $prijavaLozinkaKorisnika = $_POST['password']; 
    
            $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?"; 
            $stmt = mysqli_stmt_init($dbc); 
            if (mysqli_stmt_prepare($stmt, $sql)) 
            { 
                mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika); 
                mysqli_stmt_execute($stmt); 
                mysqli_stmt_store_result($stmt); 
            } 
            mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika); 
            mysqli_stmt_fetch($stmt);
    
            //Provjera lozinke 
            if (password_verify($_POST['password'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) 
            { 
                $uspjesnaPrijava = true;
                // Provjera da li je admin 
                if($levelKorisnika == 1) 
                { 
                    $admin = true;
                } 
                else 
                { 
                    $admin = false;
            
                } 
                
                //postavljanje session varijabli 
                
                $_SESSION['$username'] = $imeKorisnika; 
                $_SESSION['$level'] = $levelKorisnika; 
            } 
            else 
            { 
                $uspjesnaPrijava = false;
                echo '<div class="wrapper2"><p class="login-error">Krivo korisničko ime ili lozinka</p></div>';
            }
            
            // Pokaži stranicu ukoliko je korisnik uspješno prijavljen i administrator je 
            if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) 
            { 
                header("Location: administracija.php");
                    // Pokaži poruku da je korisnik uspješno prijavljen, ali nije administrator 
            } 
            else if ($uspjesnaPrijava == true && $admin == false) 
            { 
                echo '<div class="wrapper2"><p class="login-regular">Dobro došli ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali niste administrator.</p></div>';
                echo '<div class="wrapper2"><a href="logout.php" class="odjava">Odjava</a></div>';
            } 
            else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) 
            {
                echo '<p><div class="wrapper2">Dobro došli ' . $_SESSION['$username'] . '! Uspješno ste prijavljeni, ali niste administrator.</p></div>';
                echo '<div class="wrapper2"><a href="logout.php">Odjava</a></div>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="prijava.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation2.js"></script> 
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

        <section class="wrapper2">
            <form action="" method="POST" enctype="multipart/form-data" name="prijava"> <!-- skripta.php -->
                <div class="form-item">
                    <label for="username">Korisničko ime</label>
                    <div class="form-field">
                        <input type="text" name="username" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="password">Lozinka</label>
                    <div class="form-field">
                        <input type="password" name="password" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <a href="registracija.php" class="registracija">Registracija</a>
                    <button type="submit" value="Prijava" name="prijava">Prijava</button>
                    <?php
                        // if ($uspjesnaPrijava != true) {
                        //     echo '<p class="reg">Krivo korisničko ime ili lozinka</p>';
                        //     echo '<a href="registracija.php" class="registracija">Registracija</a>';
                        // }
                        // else
                        //     header("Location: administracija.php");
                    ?>
                </div>
            </form>
        </section>
    </div>
    <footer>
        <h2>Frankfurter Algemeine</h2>
        <p>&copy; Filip Tadić 0246094331</p>
    </footer>
</body>

</html>