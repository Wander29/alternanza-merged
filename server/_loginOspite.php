<?php
    require("db_info.php");
    session_start();
    $connection = mysqli_connect("localhost", $username, $password, $database);
    if(!$connection){
        die();
    }
    $query = "SELECT Permessi FROM tipo_utente WHERE Tipo = 'ospite';"; 
    $row = mysqli_fetch_array(mysqli_query($connection, $query));

    if($row[0] != null){
        $_SESSION['permessi'] = $row[0];
        $_SESSION['tipoUt'] = 'ospite';
    }

    if (strpos($_SESSION['permessi'], "HOME") !== false) { 
        header('Location: ../public/home.php');
    }
    mysqli_close($connection); 
?>