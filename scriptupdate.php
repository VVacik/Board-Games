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
mysqli_select_db($conn, "wacik");


$title = htmlspecialchars($_POST['tytul']);
$players = intval(htmlspecialchars($_POST["ileosobmax"]));
$price = intval(htmlspecialchars($_POST["cena"]));
$difficulty = htmlspecialchars($_POST["trudnosc"]);
$image = htmlspecialchars($_POST["obrazek"]);
$status = intval(isset($_POST['stan']) ? 1 : 0);
$tutorial = htmlspecialchars($_POST["link"]);
$idgry = $_POST["record_id"];


$sql = "UPDATE gry SET tytul='$title', ileosobmax='$players' ,cena='$price', link='$tutorial', stan='$status', obrazek='$image', trudnosc='$difficulty' where id_gry='$idgry'  ";

if (mysqli_query($conn, $sql)) {
    if ($status == 1) {
        header("Location: posiad.php");
    exit();
    } else {
        header("Location: pozadane.php");
    exit();
}

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    exit();
}
