<?php
	$data = array();   
    $appo = array();    
    $cnt = 0;
    $az = $_POST['azienda']; 
    require("db_info.php");
    $connection = mysqli_connect('localhost', $username, $password, $database);

    $query = "SELECT alunno.CodAlu, alunno.cognome, alunno.nome FROM alunno, azienda, tirocinio WHERE azienda.CodAz = '$az' AND azienda.CodAz = tirocinio.FKAz AND alunno.CodAlu = tirocinio.FKAlu GROUP BY CodAlu;";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
    	$data['fail'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['valore'] = "azienda = " . $az;
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