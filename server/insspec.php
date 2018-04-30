<?php

    require("db_info.php");
    session_start();
    $data = array();        // array to pass back data to ajax 
    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);

    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }
    /********** POST/GET **********/
    $spec = test_input($_POST['spec']);

    /********** Query **********/
    $query = "INSERT INTO specializzazione (Nome) VALUES('$spec')"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        $data['sucquery'] = true;
        $data['query'] = "Record  Aggiunto correttamente"; 
        $data['reload'] = true;
    }else{
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è statto possibile eseguire:  $query." . mysqli_error($connection);
        $data['errore'] = "ERRORE, record non inserito";
    }

    $data['success'] = true; //necessario per il cporretto funzionamento dell'ajax

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