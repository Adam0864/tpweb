<!doctype html>
<html lang="fr">
<head>
    <title> </title>
    <meta charset="UTF-8">
    <link href="style.css" rel="stylesheet">
</head>

<body>
<h1>Lecture des données</h1>

<?php
$filename="data.csv";

$fp = fopen($filename,"a");
if (isset($_POST["ok"],$_POST["user_nom"],$_POST["user_prenom"],$_POST["user_mail"] ) && !empty($_POST["user_mail"])){
    $nom = $_POST["user_nom"];
    $prenom = $_POST["user_prenom"];
    $mail = $_POST["user_mail"];
    $resultat=array("nom"=>$nom,"prenom"=>$prenom,"mail"=>$mail);
    fputcsv($fp,$resultat);
    fclose($fp);
}
?>


<?php
include_once('res/debug.php');
$filename="data.csv";

$fp=fopen($filename,"r");

echo "<table>";
while($resultat = fgetcsv($fp,1024,",")){
    echo "<tr>";
    foreach($resultat as $value){
        echo "<td>".$value."</td>";
    }
    echo "</tr>";
}
echo "</table>";

//echo fread($fp,filesize($filename));
fclose($fp);
?>

<form method="post">
  <ul>
    <li>
      <label for="name">Nom&nbsp;:</label>
      <input type="text" id="nom" name="user_nom" />
    </li>
    <li>
      <label for="Prénom">Prénom&nbsp;:</label>
      <input type="text" id="prenom" name="user_prenom">
    </li>
    <li>
      <label for="mail">E-mail&nbsp;:</label>
      <input type="email" id="mail" name="user_mail" />
    </li>
  </ul>
    <button type="submit" name="ok">Envoyer</button>
</form>
</body>
</html>