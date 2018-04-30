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
    $descr = $_POST['descr'];
    $descr = !empty($descr) ? "'$descr'" : "NULL";
    $ore = $_POST['ore'];       
    $date = $_POST['data'];
    $tipo = $_POST['tipo'];
    $idtir = $_POST['idtir'];


    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO diario (Data, TipoAtt, Descr, Ore, FKTir) VALUES($date, '$tipo','$descr', $ore, $idtir);"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        //update ore totali
        $query = "UPDATE tirocinio SET tirocinio.TotOre = (SELECT SUM(Ore) FROM diario WHERE diario.FKTir = {$idtir}) WHERE  tirocinio.CodTir = {$idtir}";
        if(mysqli_query($connection, $query)){
            $data['sucquery'] = true;
            $data['query'] = "Record  Aggiunto correttamente"; 
            $data['success'] = true;
            $data['reload'] = false;
        } else {
            $data['sucquery'] = false;
            $data['query'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
            $data['errore'] = "ERRORE, record non inserito";
        }
    } else {
        $data['sucquery'] = false;
        $data['query'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['errore'] = "ERRORE, record non inserito";
    }

    mysqli_close($connection); 

    echo json_encode($data);
?>