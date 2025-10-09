<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    echo "erreur connexion<br>";
}
else {
    echo "ok bd<br>";
    $base = mysqli_select_db($conn, $db);
    if (!$base) {
        echo "erreur";
    }
    else {
        echo "ok bd<br>";
        $sql = "insert into user (login,password,bureau) values (?,?,?)";
        $stmt = mysqli_prepare($conn,$sql);
        $login="tutu";
        $password="tutu";
        $bureau="204";
        mysqli_stmt_bind_param($stmt,"sss",$login,$password,$bureau);
        if (mysqli_stmt_execute($stmt)) {
            echo "Insertion successfully<br>";
        }
        else {
            echo "Error in insertion";
        }
    }
}