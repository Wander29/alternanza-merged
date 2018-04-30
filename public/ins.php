<?php 
    require("../server/db_info.php");
    session_start();
    /********** Apertura **********/
    $connection = mysqli_connect("localhost", $username, $password, $database);
    if(!$connection){
        $data["error"] = "errore nella connessione";
        die();
    }
?>

<!DOCTYPE html>
<html>
  <head>
  	<title>Inserimento Alternanza</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Inserimento ">
    <meta name="author" content="Ludovico Venturi & Luca Moroni">

    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../lib/materialize/materialize.min.css">
    <link rel="stylesheet" href="../lib/material_icons/mat_icons.css">
    <link rel="stylesheet" href="../assets/css/style_ins.css">
    
    <script src="../lib/jquery.js"></script>
    <script src="../lib/materialize/materialize.min.js"></script>
  </head>
	<body>

	<nav class="nav-extended">
		<div class="nav-wrapper">
		  <a href="#" class="brand-logo"><i class="material-icons">mode_edit</i>INSERIMENTO</a>  
      <div class="chip">
        <img id="sliderTrigger" src="../assets/img/profile.jpg" alt="Contact Person">
          <?php echo $_SESSION["name"] ?>
      </div>
      <a href="#" id="triggerat" data-activates="slide-out" class="button-collapse" style="display: none"></a>
		</div>
		<div class="nav-content">
		  <ul class="tabs tabs-transparent">
        <li class="tab"><a class="active" href="#test2">Tutor Scolastico</a></li>
        <li class="tab"><a href="#test3">Classe</a></li>
		    <li class="tab"><a href="#test1">Alunno</a></li>
		    <li class="tab"><a href="#test4">Azienda</a></li>
		    <li class="tab"><a href="#test5">Tirocinio</a></li>
		    <li class="tab"><a href="#test6">Tutor Aziendale</a></li>
        <li class="tab"><a href="#test7">Diario Personale Stage</a></li>
		  </ul>
		</div>
	</nav>
   <div class="compensatore"></div>
	<div id="test1" class="col s12">
		<div class="container">
			<h2>Inserimento Alunno</h2>
			<form class="inserimento" action="../server/insalu.php" method="post" enctype="multipart/form-data" autocomplete="off" id="alunno">
				<div class="row">
                    <div class="input-field col s12">
                      <input name="nome" id="nome" type="text" required>
                      <label for="nome">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="cognome" id="cognome" type="text" required>
                      <label for="cognome">Cognome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="codfisc" id="codfisc" type="text" required>
                      <label for="codfisc">Codice Fiscale</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="dateAl" type="text" class="datepicker" required>
                      <label for="dateAl">Data di Nascita</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="emailains" type="email" autocomplete="off" required>
                      <label for="emailains">E-Mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="pswa" type="password" autocomplete="off" required>
                      <label for="pswa">Password</label>
                    </div>
                </div>
                
                <div class="row">
	                <div class="input-field col s12">
	                    <select name="classe" id="classeAl">
	                      <option selected disabled value="" required><i> Scegli la Classe</i></option>
	                      <?php
                          $queryGetData = 'SELECT NomeClasse, CodClas FROM classe ORDER BY NomeClasse;';
                          $result = mysqli_query($connection, $queryGetData);
                          if (!$result) {
                            die('Invalid query: ' . mysql_error());
                          }

                          while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                             $classe = $row[0];
                             $idClas = $row[1];
                        ?>
	                                <option value="<?php echo $idClas;?>"><?php echo $classe;?></option>
	                      <?php 
	                      } 
	                      ?>
	                    </select>
	                    <label for="esp">Classe</label>
	                </div>
                </div>
              <button action="submit" name="action">INSERISCI</button>
            </form>
		</div>
	</div>
	<div id="test2" class="col s12">
		<div class="container">
			<h2>Inserimento Tutor Scolastico</h2>
			<form class="inserimento" action="../server/instutclass.php" method="post" enctype="multipart/form-data" autocomplete="off" id="tutsco">
				<div class="row">
                    <div class="input-field col s12">
                      <input name="nomet" id="nomet" type="text" required>
                      <label for="nomet">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="cognomet" id="cognomet" type="text" required>
                      <label for="cognomet">Cognome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="codfisct" id="codfisct" type="text" required>
                      <label for="codfisct">Codice Fiscale</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="emailpins" type="email" autocomplete="off" required>
                      <label for="emailpins">E-Mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="pswp" type="password" autocomplete="off" required>
                      <label for="pswp">Password</label>
                    </div>
                </div>
                <button action="submit" name="action">INSERISCI</button>
            </form>
		</div>
	</div>
	<div id="test3" class="col s12">
		<div class="container">

      <h2>Inserimento Specializzazione</h2>
      <form class="inserimento" action="../server/insspec.php" method="post" enctype="multipart/form-data" autocomplete="off" id="specializzazione">
        <div class="row">
          <div class="input-field col s12">
            <input name="spec" id="spec" type="text" required>
            <label for="spec">Specializzazione</label>
          </div>
        </div>
        <button action="submit" name="action">INSERISCI</button>
      </form>

			<h2>Inserimento Classe</h2>
			<form class="inserimento" action="../server/insclas.php" method="post" enctype="multipart/form-data" autocomplete="off" id="classe">
				<div class="row">
          <div class="input-field col s12">
            <input name="nomec" id="nomec" type="text" required>
            <label for="nomec">Nome Classe</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <select name="annoSc" id="annoSc">
              <option value="" disabled>Anno Scolastico</option>
              <?php 
                $varAnno = 2015;
                $currentYear = "2017/2018";
                $varAnnoSc = "";

                while ($varAnno < 2024) {
                  $varAnnoSc = $varAnno . "/" . ++$varAnno;
              ?>
                 <option value="<?php echo $varAnnoSc ?>" <?php if ($varAnnoSc == $currentYear) echo "selected" ?> ><?php echo $varAnnoSc ?></option> 
              <?php    
                }
              ?>
            </select>
            <label for="annoSc">Anno Scolastico</label>
          </div>
        </div>
                <div class="row">
                    <div class="input-field col s12">
                      <select name="fkt" id="fkt">
	                      <option selected disabled value="" required>Scegli il Tutor Scolastico</option>
	                      <?php

	                        $queryGetData = 'SELECT * FROM tutor_scolastico ORDER BY Cognome;';

	                        $result = mysqli_query($connection, $queryGetData);
	                        if (!$result) {
	                          die('Invalid query: ' . mysql_error());
	                        }
	                        //echo json_decode($aResult);

	                        $printcount = 0;

	                        while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
	                           $id = $row[0];
	                           $nome = $row[1];
	                           $cognome = $row[2];
 
	                      ?>
	                                <option value="<?php echo $id;?>"><?php echo $nome . " " . $cognome;?></option>
	                      <?php 
	                      } 
	                      ?>
	                    </select>
                      <label for="fkt">Tutor Scolastico</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <select name="fks" id="fks">
	                      <option selected disabled value="" required>Scegli la Specializzazione</option>
	                      <?php

	                        $queryGetData = 'SELECT * FROM specializzazione ORDER BY Nome;';

	                        $result = mysqli_query($connection, $queryGetData);
	                        if (!$result) {
	                          die('Invalid query: ' . mysql_error());
	                        }
	                        //echo json_decode($aResult);

	                        $printcount = 0;

	                        while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
	                           $id = $row[0];
	                           $nome = $row[1];

	                      ?>
	                                <option value="<?php echo $id;?>"><?php echo $nome;?></option>
	                      <?php 
	                      } 
	                      ?>
	                    </select>
                      <label for="fks">Specializzazione</label>
                    </div>
                </div>
                <button action="submit" name="action">INSERISCI</button>
            </form>
		</div>
	</div>
	<div id="test4" class="col s12">
		<div class="container">
			<h2>Inserimento Azienda</h2>
			<form class="inserimento" action="../server/insazienda.php" method="post" enctype="multipart/form-data" autocomplete="off" id="azienda">
				<div class="row">
                    <div class="input-field col s12">
                      <input name="nomea" id="nomea" type="text" required>
                      <label for="nomea">Nome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="piva" id="piva" type="text" required>
                      <label for="piva">Partita Iva</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="nomer" id="nomer" type="text" required>
                      <label for="nomer">Nome Rappresentante</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="sedeleg" id="sedeleg" type="text" required>
                      <label for="sedeleg">Sede Legale</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4" style='padding-top: 15px;'>
                      <a class="waves-effect waves-light btn" href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">Convert to LAT | LONG</a>
                    </div>
                    <div class="input-field col s3 offset-s1">
                      <input name="lat" id="lat" type="text" required>
                      <label for="lat">Latitudine</label>
                    </div>
                    <div class="input-field col s3 offset-s1">
                      <input name="long" id="long" type="text" required>
                      <label for="long">Longitudine</label>
                    </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                      <input name="sedetir" id="sedetir" type="text" >
                      <label for="sedetir">Sede Tirocinio (se uguale a quella Legale lascia vuoto)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="tel" id="tel" type="text" required>
                      <label for="tel">Telefono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="email" id="email" type="email" required>
                      <label for="email">E-Mail</label>
                    </div>
                </div>
                <button action="submit" name="action">INSERISCI</button>
            </form>
		</div>
	</div>
	<div id="test5" class="col s12">
		<div class="container">
			<h2>Inserimento Tirocinio</h2>
			<form class="inserimento" action="../server/instirocinio.php" method="post" enctype="multipart/form-data" autocomplete="off" id="tirocinio">
				<div class="row">
                <div class="row">
                    <div class="input-field col s12">
                      <input id="inizio" type="date" class="datepicker" required>
                      <label for="inzio">Data di Inizio</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="fine" type="date" class="datepicker" required>
                      <label for="fine">Data di Fine</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="descr" id="descr" type="text" >
                      <label for="descr">Descrizione (opzionale)</label>
                    </div>
                </div>
                <div class="row">
                  <div class="col s4">
                    <div class="input-field col s12">
                      <select name="classe_tir" id="classe_tir">
                        <option selected disabled value="" required>Scegli la Classe</option>
                        <?php
                          $queryGetData = 'SELECT NomeClasse, CodClas FROM classe ORDER BY NomeClasse';
                          $result = mysqli_query($connection, $queryGetData);
                          if (!$result) {
                            die('Invalid query: ' . mysql_error());
                          }

                          while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                             $classe = $row[0];
                             $idClas = $row[1];
                        ?>
                          <option value="<?php echo $idClas;?>"><?php echo $classe ?></option>
                        <?php 
                          } 
                        ?>
                      </select>
                      <label for="classe_tir">Classe</label>
                    </div>
                  </div>
                  <div class="col s6 offset-s2">
                    <div class="input-field col s12" id="ff">
                      <select name="fkalu" id="fkalu" required>
                        <option selected disabled value="">Scegli l'Alunno</option>
                      </select>
                      <label for="fkalu">Alunno</label>
                    </div>
                  </div>   
              	</div>
                <div class="row">
                    <div class="input-field col s12">
                      <select name="fkaz" id="fkaz">
	                      <option selected disabled value="" required>Scegli l'Azienda</option>
	                      <?php

	                        $queryGetData = 'SELECT * FROM azienda ORDER BY Nome;';

	                        $result = mysqli_query($connection, $queryGetData);
	                        if (!$result) {
	                          die('Invalid query: ' . mysql_error());
	                        }
	                        //echo json_decode($aResult);

	                        $printcount = 0;

	                        while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
	                           $id = $row[0];
	                           $nome = $row[1];
	                      ?>
	                                <option value="<?php echo $id;?>"><?php echo $nome;?></option>
	                      <?php 
	                      } 
	                      ?>
	                    </select>
                      <label for="fkaz">Azienda</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                      <textarea name="valTest" id="valTest" class="materialize-textarea" ></textarea>
                      <label for="valTest">Valutazione Testuale Tirocinio  (opzionale)</label>
                    </div>
                </div>
                <div class="row">
                  <div class="labelval">Valutazione Tirocinio:</div>
                  <div class="contval">
                    <div class="values">1</div>
                    <div class="valued">5</div>
                    <p class="range-field">
                      <input type="range" id="valut" min="1" max="5" required/>
                    </p>
                  </div>
                </div>
                <button action="submit" name="action">INSERISCI</button>
              </div>
            </form>

		</div>
	</div>
	<div id="test6" class="col s12">
		<div class="container">
			<h2>Inserimento Tutor Aziendale</h2>
			<form class="inserimento" action="../server/instutaz.php" method="post" enctype="multipart/form-data" autocomplete="off" id="tutoraziendale">
				      <div class="row">
                <div class="input-field col s12">
                  <input name="nometa" id="nometa" type="text" required>
                  <label for="nometa">Nome</label>
                </div>
              </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="cognometa" id="cognometa" type="text" required>
                      <label for="cognometa">Cognome</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="codfiscta" id="codfiscta" type="text" required>
                      <label for="codfiscta">Codice Fiscale</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="telta" id="telta" type="text" required>
                      <label for="telta">Telefono</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input name="emailta" id="emailta" type="email" required>
                      <label for="emailta">E-Mail</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <select name="fkazt" id="fkazt">
                        <option selected disabled value="" required>Scegli l'Azienda</option>
                        <?php

                          $queryGetData = 'SELECT * FROM azienda ORDER BY nome;';

                          $result = mysqli_query($connection, $queryGetData);
                          if (!$result) {
                            die('Invalid query: ' . mysql_error());
                          }
                          //echo json_decode($aResult);

                          $printcount = 0;

                          while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                             $id = $row[0];
                             $nome = $row[1];
                        ?>
                                  <option value="<?php echo $id;?>"><?php echo $nome;?></option>
                        <?php 
                        } 
                        ?>
                      </select>
                      <label for="fkazt">Azienda</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                      <input id="datetut" type="date" class="datepicker" required>
                      <label for="datetut">Data di Nascita</label>
                    </div>
                </div>
                <button action="submit" name="action">INSERISCI</button>
            </form>
		</div>
	</div>
  <div id="test7" class="col s12">
    <div class="container">
      <h3>Diario personale</h3>
      <h5 align="center">Classi | Alunni | Stage (data Inizio)</h5>
      <br>
      <ul class="collapsible popout" data-collapsible="accordion">
        <?php
          $queryGetData = 'SELECT NomeClasse, CodClas FROM classe ORDER BY NomeClasse;';
          $result = mysqli_query($connection, $queryGetData);
          if (!$result) {
            die('Invalid query: ' . mysql_error());
          }

          while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
             $classe = $row[0];
             $idClas = $row[1];
        ?>
            <li>
              <div class="collapsible-header">
                <?php echo $classe; ?>
                </div>
                <div class="collapsible-body">
                  <ul class="collapsible popout" data-collapsible="accordion">
                  <?php

                    $queryGetData2 = "SELECT alunno.CodAlu, alunno.Nome, alunno.Cognome FROM alunno WHERE alunno.FKClasse = '{$idClas}' ORDER BY alunno.cognome;";

                    $result2 = mysqli_query($connection, $queryGetData2);
                    if (!$result) {
                      die('Invalid query: ' . mysql_error());
                    }

                    while($row2 = mysqli_fetch_array($result2,MYSQLI_NUM)){
                      $ida = $row2[0];
                      $nome = $row2[1];
                      $cognome = $row2[2];

                  ?>
                      <li>
                        <div class="collapsible-header" >
                          <?php echo "<b>" . $cognome . "</b>&nbsp; " . $nome; ?>
                          </div>
                          <div class="collapsible-body">
                              <?php

                                $queryGetData3 = "SELECT tirocinio.Inizio, azienda.Nome, tirocinio.CodTir FROM tirocinio, azienda WHERE azienda.CodAz = tirocinio.FKAz AND tirocinio.FKAlu = {$ida};";

                                $result3 = mysqli_query($connection, $queryGetData3);
                                if (!$result) {
                                  die('Invalid query: ' . mysql_error());
                                }

                                while($row3 = mysqli_fetch_array($result3,MYSQLI_NUM)){
                                   $inizio = $row3[0];
                                   $az = $row3[1];
                                   $idtir = $row3[2];
                              ?>
                                  <div data-id="<?php echo $idtir; ?>" class="waves-effect waves-light btn modal-trigger" href="#modal">
                                    <?php echo $az . " | " . $inizio; ?>    
                                  </div>  
                              <?php 
                                } 
                              ?>
                          </div>
                        
                      </li>
                  <?php 
                    } 
                  ?>
                  </ul>
                </div>
            </li>
        <?php 
          } 
        ?>
      </ul>
    </div>
  </div>

    <div id="modal" class="modal modal-fixed-footer">
      <form class="inserimento" action="../server/insdia.php" method="post" enctype="multipart/form-data" autocomplete="off" id="diario">
        <div class="modal-content">
      <h4>Diario Personale Stage</h4>
      
        <div class="row">
            <div class="row">
                <div class="input-field col s12">
                  <input id="datedia" type="date" class="datepicker" required>
                  <label for="datedia">Data</label>
                </div>
            </div>
            <div class="input-field col s12">
              <select id="typeat" multiple required>
                <option value="" disabled selected>A / B / C / D</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
              </select>
              <label>Tipo di attività</label>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea id="descrdia" class="materialize-textarea"></textarea>
                <label for="descrdia">Descrizione (opzionale)</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                  <input name="oredia" id="oredia" type="text" required>
                  <label for="oredia">Ore</label>
                </div>
            </div>  
    </div>
  </div>
  <div class="modal-footer">
    <button action="submit" name="action" class="modal-action modal-close waves-effect waves-green btn-flat ">INSERISCI</button>
  </div>
  </form>
</div>

  <ul id="slide-out" class="side-nav">
    <li><div class="user-view">
      <div style="background-color: red" class="background">
      </div>
      <img class="circle" src="../assets/img/profile.jpg">
      <span class="white-text name"><?php echo $_SESSION["name"]; ?></span>
      <span class="white-text email"><?php echo $_SESSION["mail"]; ?></span>
    </div></li>
    <li><a href="#!">ESCI</a></li>
    <li><div class="divider"></div></li>
  </ul>
    <script src="../assets/js/ins_js.js"></script>
		<script src="../assets/js/ins_ajax.js"></script>
	</body>
</html>