<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>planszowki</title>
    <link rel="stylesheet" href="styl1.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <header>
        <p class="logo">Planszówki</p>
        <input type="checkbox" id="check" >
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


        <div class="search-section" id="jump">
            <h2 class="search-title">Wyszukiwanie gier</h2>
            <form method="post">
                <div class="inpulabe">
                    <Label class="label" for="title">Tytuł:</Label>
                    <input type="text" name="title" class="input" id="title">


                    <?php if (isset($_POST['error'])) { ?>
                        <p class="error">
                            reakcja
                            <?php echo $_POST['error']; ?>
                        </p>
                    <?php } ?>
                </div>

                <!-- <div class="inpulabe">
            <label class="label" for="difficulty">Poziom trudności:</label>
            <select class="input" name="difficulty" id="difficulty">
            <option hidden disabled selected value> wybierz </option>
                <option value="easy">Łatwy</option>
                <option value="medium">Średni</option>
                <option value="hard">Trudny</option>
                <option value="very-hard">Bardzo trudny</option>
            </select>
            </div> -->

                <!-- <div class="inpulabe">
            <label class="label" for="genre">Gatunek:</label>
            <select class="input" name="genre" id="genre">
            <option hidden disabled selected value> wybierz </option>
                <option value="economic">Ekonomiczna</option>
                <option value="adventure">Przygodowa</option>
                <option value="area-control">Area Control</option>
                <option value="card">Karciana</option>
                <option value="crime">Kryminalna</option>
                <option value="party">Imprezowa</option>
                <option value="deck-builder">Deckbuilder</option>
                <option value="cooperative">Kooperacyjna</option>
                <option value="dungeon-crawler">Dungeon Crawler</option>
                <option value="deduction">Dedukcja</option>
                <option value="animals">Zwierzęta</option>
                <option value="campaign-scenarios">Kampania/Scenariusze</option>
                <option value="favorite">Ulubieniec</option>
                <option value="dice">Kości</option>
                <option value="pattern-building">Budowanie Wzorów</option>
                <option value="fantasy">Fantasy</option>
                <option value="logic">Logiczna</option>
                <option value="combat">Walka</option>
                <option value="horror">Horror</option>
                <option value="cosmic">Kosmos</option>
                <option value="race">Wyścig</option>
                <option value="quiz">Quiz</option>
                <option value="puzzle">Zagadki</option>
                <option value="word">Słowna</option>
            </select>
            </div> -->
                <div class="inpulabe" id="Cenowy">
                    <label class="label" for="price">Cena(Do):</label>
                    <input class="input" type="range" id="price" name="price" min="100" max="1000" value="600"
                        step="100">
                    <label for="price" class="cenavalue">100</label>
                </div>
                <div class="inpulabe">
                    <label class="label" for="players">Max graczy:</label>
                    <input class="input" type="number" id="players" name="players" min="1" max="30">
                </div>

                <input type="submit" class="search-button" value="wyszukaj">
            </form>
        </div>
        <h1 id="góra">Gry pożądane: </h1>

        <div class="rekord-container">
            <?php

            $servername = "localhost";
            $username = "s171275";
            $password = "mywMwBZsql";
            $database = "s171275";





            $conn = mysqli_connect($servername, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }


            $title = isset($_POST['title']) ? $_POST['title'] : '';
            $price = isset($_POST['price']) ? floatval($_POST['price']) : null;
            $players = isset($_POST['players']) ? intval($_POST['players']) : null;


            $sql = "SELECT * FROM gry WHERE 1=1 AND stan='0'";
            $types = '';
            $params = array();

            if (!empty($title)) {
                $sql .= " AND tytul LIKE ?";
                $types .= 's';
                $params[] = "%$title%";
            }

            if (!is_null($price)) {
                $sql .= " AND cena <= ?";
                $types .= 'd';
                $params[] = $price;
            }

            if (!is_null($players)) {
                $sql .= " AND ileosobmax >= ?";
                $types .= 'i';
                $params[] = $players;
            }

            $difficulty_map = array(
                0 => "undefined",
                1 => "Łatwy",
                2 => "Średni",
                3 => "Trudny",
                4 => "Bardzo Trudny",
            );




            $stmt = mysqli_prepare($conn, $sql);
            if ($stmt) {
                if (!empty($params)) {
                    mysqli_stmt_bind_param($stmt, $types, ...$params);
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);



                if (mysqli_num_rows($result) > 0) {




                    while ($row = mysqli_fetch_assoc($result)) {

                        if (array_key_exists($row["trudnosc"], $difficulty_map)) {
                            $difficulty = $difficulty_map[$row["trudnosc"]];
                        } else {
                            $difficulty = 0;
                        }


                        echo "<div class = 'rekord' > " . "<div class='halfimg'><img class = 'obrazisko' src= 'zdjecia/" . $row["obrazek"] . "' alt ='png'></div>" .
                            "<div class= 'rekord-info'><h2 class = 'naglow'> " . " " . $row["tytul"] . "</h2> " . "<br>
                            <p class='paragrafrekordu'>Na ile osób: " . $row["ileosobmax"] . "</p><br>
                            <p class='paragrafrekordu'> Cena: " . $row["cena"] . " zł </p><br>
                            <p class='paragrafrekordu'> Trudność: " . $difficulty . " </p><br>
                            <a href='" . $row["link"] . "' target='_blank' class='button'>Tutorial</a> </div> 
                            <button class='edit-btn' id='" . $row["id_gry"] . "'>Edytuj</button>
                            <form class='edit-form' action='scriptupdate.php' method='post' >
                            <input class='editinput' type='text' name='tytul' value='" . $row["tytul"] . "' placeholder='Tytuł'>
                            <input class='editinput' type='number' name='ileosobmax' value='" . $row["ileosobmax"] . "' placeholder='Ilość osób'>
                            <input class='editinput' type='number' name='cena' value='" . $row["cena"] . "' placeholder='Cena'>
                            <input type='hidden' name='record_id' value='" . $row["id_gry"] . "'>
                            <input class='editinput' type='text' name='link' value='" . $row["link"] . "' placeholder='tutorial'>
                            <input class='editinput' type='text' name='obrazek' value='" . $row["obrazek"] . "' placeholder='obrazek'>
                            <p>Stan: </p><input class='editinput' type='checkbox' name='stan' checked='checked'>
                            <select class='editinput' required name='trudnosc' >
                            <option value='' disabled selected hidden>Wybierz opcję</option>
                                    <option value='0'>undefined</option> 
                                    <option value='1'>Łatwy</option>
                                    <option value='2'>Średni</option>
                                    <option value='3'>Trudny</option>
                                    <option value='4'>Bardzo trudny</option>
                            </select>
                            <input class='editinput' type='submit' value='Zapisz zmiany'>
                    </form></div>";
                    }
                } else {
                    echo "Brak wyników spełniających kryteria.";
                }


                mysqli_stmt_close($stmt);
            } else {
                echo "Błąd przy przygotowywaniu zapytania SQL: " . mysqli_error($conn);
            }

            mysqli_close($conn);
            ?>

        </div>
        <a href="#jump"><img id="powrot" src="./zdjecia/up-arrow" alt="powrót"></a>

    </main>

    <script>
    const slider = document.querySelector("#price");
    const value = document.querySelector(".cenavalue");

    value.textContent = slider.value;
    slider.oninput = function () {
        value.textContent = slider.value;
    }





    document.addEventListener('DOMContentLoaded', function () {

        var editButtons = document.querySelectorAll('.edit-btn');


        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {

                var parent = this.closest('.rekord');

                var halfimgvar = parent.querySelector('.halfimg');
                var rekordinfo = parent.querySelector('.rekord-info');
                var editForm = parent.querySelector('.edit-form');


                if (editForm) {
                    if (editForm.style.display === 'none') {
                        editForm.style.display = 'grid';
                        halfimgvar.style.display = 'none';
                        rekordinfo.style.display = 'none';
                    } else {
                        editForm.style.display = 'none';
                        halfimgvar.style.display = 'block';
                        rekordinfo.style.display = 'block';
                    }
                }
            });
        });
    });

</script>



</body>



</html>