<?php
	$data = array();   
    $appo = array();    
    $cnt = 0;
    $al = $_POST['alunno']; 
    require("db_info.php");
    $connection = mysqli_connect('localhost', $username, $password, $database);

    $query = "SELECT tirocinio.CodTir, tirocinio.Inizio, tirocinio.Fine FROM alunno, tirocinio WHERE alunno.CodAlu = '$al' AND alunno.CodAlu = tirocinio.FKAlu;";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
    	$data['fail'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['valore'] = "alunno = " . $al;
    } else {    
        while ($row = mysqli_fetch_row($result)){
            $appo[$cnt] = $row; 
            $cnt++;
        }
        $data['query'] = $appo;
    }
    mysqli_close($connection); 

    echo json_encode($data); //funzione di ritorno tramite JSON/XML
?>