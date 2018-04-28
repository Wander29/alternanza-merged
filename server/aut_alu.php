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
    //in post prendo tutti i dati che vengono passati dal ajax
    $mail = test_input($_POST['mail']);
    $psw = md5(test_input($_POST['psw']));


    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "SELECT Nome, Cognome, EMail FROM alunno WHERE EMail = '$mail' AND Password = '$psw';"; //query da sparare nel DB 

    $row = mysqli_fetch_array(mysqli_query($connection, $query));
    
    if($row[0] != null){
        $data["result"] = $row[0] . " " . $row[1];

        $_SESSION["name"] = $data["result"];
        $_SESSION["mail"] = $row[2];
        $data['user'] = 'alunno';
    } else {
        $data['sucquery'] = false;
        $data['query'] = "ERRORE di autenticazione";
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