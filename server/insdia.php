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
        if ($descr == "")
            $descr = null;
    $ore = $_POST['ore'];       
    $date = $_POST['data'];
    $tipo = $_POST['tipo'];
    $idtir = $_POST['idtir'];


    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO diario (CodDia, Data, TipoAtt, Descr, Ore, FKTir) VALUES(null, $date, '$tipo','$descr', $ore, $idtir);"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
        //update delle ore totali, prima prendo l'id
        $query = "SELECT MAX(tirocinio.CodTir) FROM tirocinio";
        $result = mysqli_query($connection, $query);
          if (!$result) {
            $data['sucquery'] = false;
            $data['query'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
            die ('Invalid query: ' . mysql_error());
          }
          while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
              $id_tir_inserito = $row[0];
          }
        
        $query = "UPDATE tirocinio SET tirocinio.TotOre = (SELECT SUM(Ore) FROM diario WHERE diario.FKTir = {$id_tir_inserito}) WHERE  tirocinio.CodTir = {$id_tir_inserito}";
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