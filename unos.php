<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="forma.css">
    <script type="text/javascript" src="jquery-1.11.0.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="js/form-validation3.js"></script>
    <title>Frankfurter Algemeine</title>
</head>

<body>
    <div class="wrapper">
        <header>
            <nav>
                <ul class="nav-list">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="culture.php">Kultura</a></li>
                    <li><a href="sport.php">Sport</a></li>
                    <li><a href="unos.php">Unos</a></li>
                    <li><a href="administracija.php">Administracija</a></li>
                </ul>
            </nav>
            <h1>Frankfurter Algemeine</h1>
        </header>

        <section class="wrapper2">
            <form action="skripta.php" method="POST" enctype="multipart/form-data" name="unos"> <!-- skripta.php -->
                <div class="form-item">
                    <label for="title">Naslov vijesti</label>
                    <div class="form-field">
                        <input type="text" name="title" class="form-field-textual">
                        <span id="porukaTitle" class="bojaPoruke"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="about">Kratki sadržaj vijesti (do 50
                        znakova)</label>
                    <div class="form-field">
                        <textarea id="" cols="30" rows="10" class="formfield-textual" name="ksadrzaj"></textarea>
                        <span id="porukaAbout" class="bojaPoruke"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="content">Sadržaj vijesti</label>
                    <div class="form-field">
                        <textarea name="content" id="" cols="30" rows="10" class="form-field-textual"></textarea>
                        <span id="porukaContent" class="bojaPoruke"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="pphoto">Slika: </label>
                    <div class="form-field">
                        <input type="file" accept="image/jpg,image/gif" class="file" name="photo" />
                        <span id="porukaSlika" class="bojaPoruke"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label for="category">Kategorija vijesti</label>
                    <div class="form-field">
                        <select name="category" id="" class="form-field-textual">
                            <option value="">Odabir kategorije</option>
                            <option value="kultura">Kultura</option>
                            <option value="sport">Sport</option>
                        </select>
                        <span id="porukaKategorija" class="bojaPoruke"></span>
                    </div>
                </div>
                <div class="form-item">
                    <label>Spremiti u arhivu:
                        <div class="form-field">
                            <input type="checkbox" name="archive" class="checkbox">
                        </div>
                    </label>
                </div>
                <div class="form-item">
                    <button type="reset" value="Poništi" class="ponisti" name="ponisti">Poništi</button>
                    <a href="skripta.php">
                        <button type="submit" value="Prihvati" class="prihvati" name="prihvati" id="gumb">Prihvati</button>
                    </a>
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