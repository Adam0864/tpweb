<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "test";
$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    echo "erreur connexion";
}
else{
    echo "ok bd";
    $base=mysqli_select_db($conn,$db);
    if(!$base){
        echo "erreur";
    }
    else{
        echo "ok bd";
        $sql="select * from user";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo $row['login'] . "<br>";
                echo $row['password'] . "<br>";
                echo $row['bureau'] . "<br>";
            }
        }
    }
}

mysqli_close($conn);