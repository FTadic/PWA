<?php
    // start a session 
    session_start();
    include 'connect.php';
    define('UPLPATH', 'img/');

    if (isset($_POST['registracija']))
    {
        if (isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['username']) && isset($_POST['password2']))
        {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $username = $_POST['username'];
            $lozinka = $_POST['password2'];
            
            $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
            $razina = 0;
            $registriranKorisnik = '';
            
            //Provjera postoji li u bazi već korisnik s tim korisničkim imenom 
            $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $sql)) 
            {
                mysqli_stmt_bind_param($stmt, 's', $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
            }
            if (mysqli_stmt_num_rows($stmt) > 0)
            {
                $msg = 'Korisničko ime već postoji!';
            }
            else 
            {
                // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection 
                $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina)
                    VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
                    mysqli_stmt_execute($stmt);
                    $registriranKorisnik = true;
                }
            }
            
            mysqli_close($dbc);
            
            // Registracija je prošla uspješno 
            if ($registriranKorisnik == true) {
                echo '<p>Korisnik je uspješno registriran!</p>';
                header("Location: prijava.php");
            }
            else {
                echo '<p>Neuspješna registracija</p>';
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
    <link rel="stylesheet" type="text/css" href="registracija.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation.js"></script> 
    <title>Frankfurter Algemeine</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <nav>
                <ul class="nav-list">
                    <li><a href="index.php">Početna</a></li>
                    <li><a href="culture.php">Politics</a></li>
                    <li><a href="sport.php">Sport</a></li>
                    <li><a href="unos.php">Unos</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>
            <h1>Frankfurter Algemeine</h1>
        </header>

        <section class="wrapper2">
            <form action="registracija.php" method="POST" enctype="multipart/form-data" name="registracija"> <!-- skripta.php -->
                <div class="form-item">
                    <label for="ime">Ime</label>
                    <div class="form-field">
                        <input type="text" name="ime" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="prezime">Prezime</label>
                    <div class="form-field">
                        <input type="text" name="prezime" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="username">Korisničko ime</label>
                    <div class="form-field">
                        <input type="text" name="username" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="password1">Lozinka</label>
                    <div class="form-field">
                        <input type="password" name="password1" id="password1" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <label for="password2">Ponovite lozinku</label>
                    <div class="form-field">
                        <input type="password" name="password2" class="form-field-textual">
                    </div>
                </div>
                <div class="form-item">
                    <button type="submit" value="Registracija" name="registracija">Registracija</button>
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

</body>
</html>