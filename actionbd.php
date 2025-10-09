<?php
$login = $_POST["login"];
$mdp = $_POST["password"];
$host = "localhost";
$user = "root";
$pass = "";
$db = "test";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

$sql = "SELECT * FROM user WHERE login = ? AND password = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo("Erreur lors de la préparation de la requête : " . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ss", $login, $mdp);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        session_start();
        $_SESSION['login']=$login;
        header("location: admin.php");
    }
} else {
    echo "Utilisateur non trouvé ou mot de passe incorrect.";
}


mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
