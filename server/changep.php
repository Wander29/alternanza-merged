<?php

    require("db_info.php");
    session_start();
    $data = array(); 		// array to pass back data to ajax 
    
    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);

    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }

    /********** POST/GET **********/
    $nomeut = test_input($_POST['nomeut']);
    $oldpsw = md5(test_input($_POST['oldpsw']));
    $newpsw = md5(test_input($_POST['newpsw']));

    /********** Query **********/
    $query_verifica = "SELECT Nome FROM tutor_scolastico WHERE EMail = '$nomeut' AND Password = '$oldpsw';";
    $query_modifica = "UPDATE tutor_scolastico SET Password = '$newpsw' WHERE EMail = '$nomeut' AND Password = '$oldpsw';";

    $verifica = mysqli_fetch_array(mysqli_query($connection, $query_verifica));
    
    if($verifica != null){
        $modifica = mysqli_query($connection, $query_modifica);
        if($modifica){
            $data['success'] = false;
            $data['query'] = "Errore";
        }
        $data['success'] = true;
        $data['query'] = "Password cambiata";
    } else {
        $data['success'] = false;
        $data['query'] = "Errore";
    }
    


    /********** Chiusura **********/
    mysqli_close($connection); // Chiusura connessione


    /********** Return Ajax **********/
	echo json_encode($data); //funzione di ritorno tramite JSON


    /********** Funzioni **********/
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>