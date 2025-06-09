<?php
session_start();

if (isset($_SESSION["id"]) && isset($_SESSION['uzytk'])) {

    ?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>planszowki</title>
        <link rel="stylesheet" href="styl-form.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>


        <header>
            <p class="logo">Planszówki</p>
            <input type="checkbox" id="check" />
            <label for="check" id="checkbtn">
                <i class="bx bx-menu"></i>
            </label>
            <ul id="menu">
                <li class="przyci"><a href="index.php">Menu</a></li>
                <li class="przyci"><a href="dodaj.php">Dodaj Gry</a></li>
                <li class="przyci">
                    <a href="posiad.php">Wyświetl posiadane</a>
                </li>
                <li class="przyci">
                    <a href="pozadane.php">Wyświetl pożądane</a>
                </li>
            </ul>
        </header>

        <main>
            <div class="formdodajdiv">
                <h1>Dodawanie gier</h1>
                <div id="form-wyloguj">
                    <h4>Zalogowany użytkownik: </h4>
                    <?php echo $_SESSION['uzytk']; ?>
                    <hr>

                    <form action="wyloguj.php" method="post">
                        <input type="submit" value="Wyloguj" id="wylogowanie">
                    </form>
                </div>
                <form method="post" action="sriptadd.php" id="form-dodaj">

                    <div id="left">
                        <div class="inpulabel">
                            <label for="title">Tytuł</label>
                            <input required type="text" name="title">
                        </div>

                        <div class="inpulabel">
                            <label for="price">Cena</label>
                            <input required type="number" name="price">
                        </div>

                        <div class="inpulabel">
                            <label for="players">Ile graczy max</label>
                            <input required class="input" type="number" id="players" name="players" min="1" max="30"
                                value="0">
                        </div>

                        <div class="inpulabel">
                            <label class="label" for="difficulty">Poziom trudności:</label>
                            <select required class="input" name="difficulty" id="difficulty">
                                <option hidden disabled selected value> wybierz </option>
                                <option value="easy">Łatwy</option>
                                <option value="medium">Średni</option>
                                <option value="hard">Trudny</option>
                                <option value="very-hard">Bardzo trudny</option>
                            </select>
                        </div>

                        <div class="inpulabel">
                            <label for="image">Nazwa pliku obrazka</label>
                            <input required type="text" name="image">
                        </div>

                        <div class="inpulabel">

                            <label for="status">Czy posiadasz tą grę?</label>
                            <input type="checkbox" name="status"><br>

                        </div>
                        <div class="inpulabel">


                            <label for="tutorial">wklej link do tutoriala</label>
                            <input required type="text" name="tutorial">
                        </div>


                    </div>
                    <input type="submit" id="dodajgre" class="search-button" value="dodaj">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>

                </form>

            </div>

        </main>

        </div>

        <footer>
            <p>Placeholder</p>
        </footer>


    </body>

    </html>

    <?php
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>logowanie</title>
        <link rel="stylesheet" href="./style.css">

    </head>

    <body>
        <div id="background">
            <a href="index.php"><img id="strzalka" src="powrot.png" alt="wróć"></a>
            <div class="login-page">
                <div class="form" id="logform">
                    <h1 class="banner1">Zarejestruj</h1>
                    <form method="post" class="login-form bark" action="loginscript.php" >
                        <input type="text" name="uname" placeholder="login" id="login" />
                        <input type="password" name="password" placeholder="Hasło" id="haslo" />
                        <input id="guzik" type="submit" name="zaloguj" value="Zaloguj">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error">
                                <?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>

                        <a href="#" class="register-link">Zarejestruj</a>
                    </form>
                </div>

                <div class="form reg" id="regform">

                    <h1 class="banner2">Zaloguj</h1>
                    <form method="post" class="register-form bark" action="registerscript.php" >
                        <input type="text" name="uname" placeholder="login" id="login2" />
                        <input type="password" name="password" placeholder="Hasło" id="haslo2" />
                        <input type="password" name="checkpassword" placeholder="Ponów Hasło" id="ponowhaslo" />
                        <input id="guzik2" type="submit" name="zarejestruj" value="Zarejestruj">
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error">
                                <?php echo $_GET['error']; ?>
                            </p>
                        <?php } ?>

                        <a href="#" class="login-link">Mam już konto</a>
                    </form>

                </div>

            </div>
        </div>

        <script>
        const wrapper = document.querySelector(".login-page");
        const loginLink = document.querySelector(".login-link");
        const registerLink = document.querySelector(".register-link");


        registerLink.addEventListener('click', () => {
            wrapper.classList.add('active');
        })

        loginLink.addEventListener('click', () => {
            wrapper.classList.remove('active');
        })
    </script>
    </body>
    

    </html>

<?php } ?>