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
    $nomea = $_POST['nomea'];
    $piva = $_POST['piva'];       
    $nomer = $_POST['nomer'];
    $lat = $_POST['lat'];
    $long = $_POST['long'];
    $sedeleg = $_POST['sedeleg'];
    $sedetir = $_POST['sedetir'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];

    $sedetir = !empty($sedetir) ? "'$sedetir'" : "NULL";

    /********** Query **********/
    //eseguo una query utilizzando la connessione come parametro della funzione 
    $query = "INSERT INTO azienda (CodAz, Nome, PIVA, NomeRap, SedeLegale, Lat, Lon, SedeTirocinio, Tel, Email) VALUES(null, '$nomea', '$piva', '$nomer', '$sedeleg', $lat, $long, ".$sedetir.", '$tel', '$email');"; //query da sparare nel DB 

    if(mysqli_query($connection, $query)){
            $query = "SELECT CodAz FROM azienda WHERE PIVA = $piva;"; //query da sparare nel DB 
            $result = mysqli_query($connection, $query);
              if (!$result) {
                die('Invalid query: ' . mysql_error());
              }
              if($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                 $idAz = $row[0];

                $data['idAz'] = $idAz;
                $data['sucquery'] = true;
                $data['query'] = "Record  Aggiunto correttamente"; 
                $data['reload'] = false;
            }
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