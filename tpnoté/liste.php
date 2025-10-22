<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="TP3CSS.css" />
</head>
<header>
    <h1>TP web PHP&MYSQL</h1>
    <a href="connexion.html" style="color: black">connexion</a>
</header>
<body>
<div class="container">
    <div class="left">
        <a href="accueil.html">accueil</a>
        <a href="liste.php">liste</a>
        <a href="damier">damier</a>
    </div>

    <div class="right">
        <table>
            <thead>
            <tr>
                <th>nom</th>
                <th>prix unitaire</th>
                <th>quantite</th>
                <th>référence</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "produits";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    echo("Erreur de connexion à la base de données : " . mysqli_connect_error());
}

$sql = "SELECT * FROM article";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    echo("Erreur lors de la préparation de la requête : " . mysqli_error($conn));
}

mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $nom, $prix, $quantite, $reference);
while (mysqli_stmt_fetch($stmt)) {
    echo "<tr>";
    echo "<td>" . $nom . "</td>";
    echo "<td>" . $prix . "</td>";
    echo "<td>" . $quantite . "</td>";
    echo "<td>" . $reference . "</td>";
    echo "<td><a href='modifier.php'>modifier</a></td>";
    echo "</tr>";
}



mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
            </tbody>
            </table>
    </div>
</body>
</html>