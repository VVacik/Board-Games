<?php

session_start();

if(isset($_POST['zaloguj'])){
$servername = "localhost";
$username = "s171275";
$password = "mywMwBZsql";
$dbname = "s171275";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("" . mysqli_connect_error());
}
mysqli_select_db($conn, "wacik");


$uname = htmlspecialchars($_POST['uname']);
$passwd = htmlspecialchars($_POST["password"]);


if(empty($uname)) {
     header('Location: dodaj.php?error=wymagany login');
     exit();
}

if(empty($passwd)) {
    header('Location: dodaj.php?error=wymagane hasło');
        exit();
    }



    $sql = "SELECT * FROM uzytkownicy where login_uzyt='$uname' AND haslo ='$passwd'";
    $wynik = mysqli_query($conn, $sql);

    if(mysqli_num_rows($wynik) === 1) {
        

        $wiersz = mysqli_fetch_assoc($wynik);

        
        if(($wiersz['login_uzyt'] === $uname) && ($wiersz['haslo'] === $passwd)) {
            echo "Zalogowano";
            $_SESSION['uzytk'] = $wiersz['login_uzyt'];
            $_SESSION['id'] = $wiersz['id'];
            header("Location: dodaj.php");
            exit();
        }
        else {
            header('Location: dodaj.php?error= Zły login lub Hasło');
            exit();
        }

    }
    else {
        
        header('Location: dodaj.php?error=nie ma takiego użytkownika załóż konto');
        exit();
    }
}
    
?>