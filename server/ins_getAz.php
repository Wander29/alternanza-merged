<?php
	$data = array();   
    $appo = array();    
    $cnt = 0;
    $tut = $_POST['tutor']; 
    require("db_info.php");
    $connection = mysqli_connect('localhost', $username, $password, $database);

    $query = "SELECT az.CodAz, az.Nome FROM azienda AS az, alunno AS al, classe AS c, tirocinio AS t WHERE c.FKTutSc = $tut AND c.CodClas = al.FKClasse AND al.CodAlu = t.FKAlu AND t.FKAz = az.CodAz GROUP BY az.CodAz;";
  
    $result = mysqli_query($connection, $query);
    if (!$result) {
    	$data['fail'] = "ERRORE: Non è stato possibile eseguire:  $query." . mysqli_error($connection);
        $data['valore'] = "classe = " . $classe;
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