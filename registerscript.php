<?php


if(isset($_POST['zarejestruj'])){
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
$checkpasswd = htmlspecialchars($_POST["checkpassword"]);



if(empty($uname)) {
     header('Location: dodaj.php?error=wymagany login');
     exit();
}

if(empty($passwd)) {
    header('Location: dodaj.php?error=Utwórz hasło');
        exit();
    }

if(empty($checkpasswd)) {
    header('Location: dodaj.php?error=Powtórz hasło');
            exit();
        }


$wynik= mysqli_query($conn ,"SELECT * FROM uzytkownicy where login_uzyt='$uname'");

    if(mysqli_num_rows($wynik) === 1) {
        header('Location: dodaj.php?error=Taki użytkownik juz istnieje');
            exit();
    }


if($passwd === $checkpasswd) {
    $sql = "INSERT INTO uzytkownicy(login_uzyt, haslo) VALUES (?, ?)";


    $stmt = mysqli_stmt_init($conn);
    if (! mysqli_stmt_prepare($stmt, $sql)) {
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "ss", $uname, $passwd);

    mysqli_stmt_execute($stmt);

    header('Location: dodaj.php?error=Konto utworzone, możesz się zalogować');
    exit();

}
else{
    header('Location: dodaj.php?error=Hasła nie są identyczne, sprawdź poprawność');
    exit();

    
}
   
}
    
?>