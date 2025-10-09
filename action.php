<?php
$login=$_POST["login"];
$mdp=$_POST["password"];
$filename="log.csv";
$fp = fopen($filename,"r");
while ($resultat=fgetcsv($fp,1024,",")) {
    if ($resultat[0]==$login && $resultat[1]==$mdp) {
        fclose($filename);
        session_start();
        $_SESSION['login']=$login;
        header("location: admin.php");
    }
    else{
        header("location: login.php?error");
    }
}

/*
if ($login=='admin' && $mdp=='admin'){
    session_start();
    $_SESSION['login']=$login;
    header("location: admin.php");
}else if ($login!='admin' && $mdp!='admin' && !empty($login) && !empty($mdp)){

    $fp = fopen($filename,"a");
    $resultat=array("login"=>$login,"password"=>$mdp);
    fputcsv($fp,$resultat);
    fclose($fp);
}
else{*/

