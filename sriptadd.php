<?php

session_start();

$servername = "localhost";
$username = "s171275";
$password = "mywMwBZsql";
$dbname = "s171275";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("" . mysqli_connect_error());
}
mysqli_select_db($conn, "s171275");


$title = htmlspecialchars($_POST['title']);
$players = intval(htmlspecialchars($_POST["players"]));
$price = intval(htmlspecialchars($_POST["price"]));
$difficulty_text = htmlspecialchars($_POST["difficulty"]);
$image = htmlspecialchars($_POST["image"]);
$status = intval(isset($_POST['status']) ? 1 : 0);
$tutorial = htmlspecialchars($_POST["tutorial"]);

$difficulty_map = array(
    "easy" => 1,
    "medium" => 2,
    "hard" => 3,
    "very-hard" => 4
);


if (array_key_exists($difficulty_text, $difficulty_map)) {
    $difficulty = $difficulty_map[$difficulty_text];
} else {
    $difficulty = 0;
}

$szukana_nazwa = $image;


$sciezka_do_folderu = "./zdjecia/";


if (file_exists($sciezka_do_folderu . $szukana_nazwa)) {
    
    $znaleziony_plik = $szukana_nazwa;
} else {
    
    $image= "placeholder.png";
}



$sql = "INSERT INTO gry(tytul, ileosobmax, cena, link, stan, obrazek, trudnosc) VALUES( ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "siisisi", $title, $players, $price, $tutorial, $status , $image, $difficulty );
    mysqli_stmt_execute($stmt);

    header('Location: dodaj.php?error=dodano rekord');

    exit();

