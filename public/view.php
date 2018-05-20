<?php 
  require("../server/db_info.php"); 
  session_start();
  $connection = mysqli_connect ('localhost', $username, $password, $database);
  if (!$connection) {  die('Not connected : ' . mysqli_error()); }
  if (strpos($_SESSION['permessi'], "VIEW") !== false) { 
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Form visualizzaione">
        <meta name="author" content="Ludovico Venturi & Luca Moroni">

        <link rel="stylesheet" href="../assets/css/fonts.css">
        <link rel="icon" href="../assets/img/favicon.png">
        <link rel="stylesheet" href="../lib/materialize/materialize.min.css">
        <link rel="stylesheet" href="../assets/css/style_view.css">

        <script src="../lib/jquery.js"></script>
        <script src="../lib/materialize/materialize.min.js"></script>
        <script src="../assets/js/view_js.js"></script>

        <title>Alternanza VIEW</title>
    </head>
    <body>
        <nav class="nav-extended">
            <div class="nav-wrapper">
              <div class="logo">
                <a href="#" class="brand-logo"><i class="material-icons">visibility</i> VISUALIZZAZIONE</a></div>
                <a href="home.php" class="brand-logo center"><i class="material-icons">home</i>Alternanza Scuola-Lavoro</a>
              <?php if ($_SESSION['tipoUt'] !== "ospite") { ?>
                <div class="chip">
                  <img id="sliderTrigger" data-activates="slide-out" src="../assets/img/profile.jpg" alt="Contact Person">
                    <?php echo $_SESSION["name"] ?>
                </div>
              <?php } ?>
            </div>
            </div>
            <div class="nav-content">
              <ul class="tabs tabs-transparent">
                <?php if (strpos($_SESSION['permessi'], "VCL") !== false) { ?>
                  <li class="tab"><a class="active" href="#1classi">Classi</a></li> <?php } ?>
                <?php if (strpos($_SESSION['permessi'], "VTIR") !== false) { ?>
                  <li class="tab"><a href="#2tirocini">Tirocini</a></li>  <?php } ?>
                <?php if (strpos($_SESSION['permessi'], "VAZ") !== false) { ?>
                  <li class="tab"><a href="#3aziende">Aziende</a></li>  <?php } ?>
                <?php if (strpos($_SESSION['permessi'], "VTUTSC") !== false) { ?>
                  <li class="tab"><a href="#4tutsc">Tutor Scolastici</a></li>  <?php } ?>
              </ul>
            </div>
          </nav>
          <div class="compensatore"></div>
          <?php if (strpos($_SESSION['permessi'], "VCL") !== false) { ?>
            <div id="1classi" class="col s12"> <!-- CLASSI -->
              <div class="container">
                <br>
                <h5>Specializzazioni | Classi | Alunni</h5>
                <br>
                    <ul class="collapsible popout" data-collapsible="accordion">
                        <?php
                            $query1 = "SELECT * FROM specializzazione ORDER BY nome"; 
                            $result1 = mysqli_query($connection, $query1);
                            if (!$result1) {
                                die ('Invalid query: ' . mysql_error());
                            }
                            while($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)){
                                $idSpec1 = $row1[0];
                                $spec1 = $row1[1];
                        ?>
                            <li>
                              <div class="collapsible-header" <?php echo "id='" . $idSpec1 . "'" ?> >
                                <i class="material-icons">school</i><?php echo $spec1 ?></div>
                              <div class="collapsible-body"> <!-- Classi interne -->
                                    <ul class="collapsible" data-collapsible="accordion">
                                        <?php
                                            $query2 = "SELECT classe.CodClas, tutor_scolastico.Nome, tutor_scolastico.Cognome, classe.NomeClasse FROM classe, tutor_scolastico WHERE classe.FKTutSc = tutor_scolastico.CodTutSc AND classe.FKSpec = {$idSpec1} ORDER BY classe.NomeClasse"; 
                                            $result2 = mysqli_query($connection, $query2);
                                            if (!$result2) {
                                                die ('Invalid query: ' . mysql_error());
                                            }
                                            while($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)){
                                                $idClas2 = $row2[0];
                                                $nomeTut2 = $row2[1];
                                                $cogTut2 = $row2[2];
                                                $nomeClas2 = $row2[3];
                                        ?>
                                        <li>
                                            <div class="collapsible-header" <?php echo "id='" . $idClas2 . "'" ?> ><i class="material-icons">donut_large</i>
                                                <table>
                                                    <tr>
                                                        <td><b><?php echo $nomeClas2 ?></b></td>
                                                        <td class="tut-sc">Tutor Scolastico: <?php echo $nomeTut2 . " " . $cogTut2 ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="collapsible-body">
                                                <table>
                                                    <?php
                                                        $query3 = "SELECT alunno.CodAlu, alunno.cognome, alunno.nome, alunno.CodFisc, alunno.DataNasc FROM alunno WHERE alunno.FKClasse = '{$idClas2}'"; 
                                                        $result3 = mysqli_query($connection, $query3);
                                                        if (!$result3) {
                                                            die ('Invalid query: ' . mysql_error());
                                                        }
                                                        while($row3 = mysqli_fetch_array($result3, MYSQLI_NUM)){
                                                            $idAlu3 = $row3[0];
                                                            $cog3 = $row3[1];
                                                            $nome3 = $row3[2];
                                                            $codFisc3 = $row3[3];
                                                            $dataNasc3 = $row3[4];
                                                    ?>
                                                            <tr <?php echo "id='" . $idAlu3 . "'" ?>>
                                                                <td><b><?php echo $cog3 ?></b></td>
                                                                <td><?php echo $nome3 ?></td>
                                                                <td><?php echo $codFisc3 ?></td>
                                                                <td><?php echo $dataNasc3 ?></td>
                                                            </tr>
                                                <?php }; ?>
                                            </table>
                                        </div>
                                    </li>
                                <?php }; ?>
                            </ul>
                        </div>
                    </li>
                <?php }; ?>
            </ul>
        </div>
    </div>
  <?php } ?>
<?php if (strpos($_SESSION['permessi'], "VTIR") !== false) { ?>
<div id="2tirocini" class="col s12">
    <div class="container">
        <br>
        <h5>Classi | Alunni | Tirocini | Registri</h5>
        <br>
        <ul class="collapsible popout" data-collapsible="accordion">
            <?php

              $query4 = 'SELECT CodClas, NomeClasse FROM classe ORDER BY NomeClasse';

              $result4 = mysqli_query($connection, $query4);
              if (!$result4) {
                die('Invalid query: ' . mysql_error());
              }

              while($row4 = mysqli_fetch_array($result4,MYSQLI_NUM)){
                 $id4 = $row4[0];
                 $clas4 = $row4[1];
            ?>
            <li>
                <div class="collapsible-header">
                  <i class="material-icons">donut_large</i>
                  <?php echo $clas4; ?>
                </div>
                <div class="collapsible-body">
                  <!-- NOME e COGNOME -->
                  <ul class="collapsible popout" data-collapsible="accordion">
                  <?php

                    $query5 = "SELECT alunno.CodAlu, alunno.Nome, alunno.Cognome FROM alunno WHERE alunno.FKClasse = '{$id4}' ORDER BY alunno.cognome;";

                    $result5 = mysqli_query($connection, $query5);
                    if (!$result5) {
                      die('Invalid query: ' . mysql_error());
                    }

                    while($row5 = mysqli_fetch_array($result5,MYSQLI_NUM)){
                      $ida5 = $row5[0];
                      $nome5 = $row5[1];
                      $cognome5 = $row5[2];
                  ?>
                  <li>
                    <div class="collapsible-header" >
                      <?php echo "<b>" . $cognome5 . "</b> &nbsp;" . $nome5; ?>

                    </div>
                    <div class="collapsible-body">
                      <!-- TIROCINI -->
                      <ul class="collapsible" data-collapsible="accordion">
                          <?php
                            $query6 = "SELECT tirocinio.Inizio, azienda.Nome, tirocinio.CodTir, tirocinio.Fine, azienda.CodAz FROM tirocinio, azienda WHERE azienda.CodAz = tirocinio.FKAz AND tirocinio.FKAlu = {$ida5};";

                            $result6 = mysqli_query($connection, $query6);
                            if (!$result6) {
                              die('Invalid query: ' . mysql_error());
                            }

                            while($row6 = mysqli_fetch_array($result6,MYSQLI_NUM)){
                               $inizio6 = $row6[0];
                               $az6 = $row6[1];
                               $idtir6 = $row6[2];
                               $fine6 = $row6[3];
                               $idAz6 = $row6[4];
                          ?>
                          <li>
                            <div class="collapsible-header">
                              <i class="material-icons">work</i><?php echo $az6 . " | " . $inizio6; ?>
                            </div>
                            <div class="collapsible-body">
                              <!-- Info Aziende - Registri -->
                              <ul class="collapsible" data-collapsible="accordion">
                                <li>
                                  <div class="collapsible-header">
                                    <i class="material-icons">format_list_bulleted</i> Informazioni Tirocinio
                                  </div>
                                  <div class="collapsible-body">
                                    <?php
                                      $query7 = "SELECT t.TotOre, t.Descr, t.ValTest, t.ValVoto FROM `tirocinio` AS t WHERE t.CodTir = {$idtir6};";

                                      $result7 = mysqli_query($connection, $query7);
                                      if (!$result7) {
                                        echo $query7;
                                        die('Invalid query: ' . mysql_error());
                                      }

                                      if($row7 = mysqli_fetch_array($result7,MYSQLI_NUM)){
                                         $totOre7 = $row7[0];
                                         $descr7 = $row7[1];
                                         $valtest7 = $row7[2];
                                         $valvoto7 = $row7[3];

                                     $query7b = "SELECT a.SedeLegale, a.SedeTirocinio FROM azienda AS a WHERE a.CodAz = {$idAz6};";

                                      $result7b = mysqli_query($connection, $query7b);
                                      if (!$result7b) {
                                        die('Invalid query: ' . mysql_error());
                                      }

                                      if($row7b = mysqli_fetch_array($result7b,MYSQLI_NUM)){
                                         $sedeLeg7b = $row7b[0];
                                         $sedeTir7b = $row7b[1];
                                    ?>
                                      <b>Azienda:</b> <?php echo $az6 ?><br>
                                      <b>Data Inizio:</b> <?php echo $inizio6 ?><br>
                                      <b>Data Fine:</b> <?php echo $fine6 ?><br>
                                      <b>Totale Ore:</b> <?php echo $totOre7 ?>h<br>

                                      <?php 
                                        if ($sedeTir7b != null) { 
                                      ?>
                                          <b>Sede Tirocinio:</b> <?php echo $sedeTir7b ?><br>
                                          <b>Sede Legale:</b> <?php echo $sedeLeg7b ?><br>
                                      <?php 
                                        } else { 
                                      ?>
                                          <b>Sede Tirocinio (e Legale): </b><?php echo $sedeLeg7b ?><br>
                                      <?php } ?>

                                      <?php 
                                        if($descr7 != null){ 
                                      ?>
                                        <b>Descrizione</b><br> <?php echo $descr7 ?><br><br>
                                      <?php 
                                        } 
                                      ?>

                                      <?php if($valtest7 != null){ ?>
                                        <b>Valutazione</b><br>
                                        <?php echo $valtest7 ?><br><br>
                                      <?php } ?>

                                      <b>Voto Tirocinio:</b> <?php echo $valvoto7 ?>
                                    <?php }
                                      }
                                    ?>
                                  </div>
                                </li>
                                <li>
                                  <div class="collapsible-header">
                                    <i class="material-icons">chrome_reader_mode</i> Registri Giornalieri
                                  </div>
                                  <div class="collapsible-body">
                                    <?php
                                      $query8 = "SELECT d.Data, d.CodDia  FROM diario AS d WHERE d.FKTir = {$idtir6} ORDER BY d.Data";

                                      $result8 = mysqli_query($connection, $query8);
                                      if (!$result8) {
                                        die('Invalid query: ' . mysql_error());
                                      }

                                      while ($row8 = mysqli_fetch_array($result8,MYSQLI_NUM)){
                                         $data8 = $row8[0];
                                         $codDia8 = $row8[1];
                                    ?>
                                    <div class="waves-effect waves-light btn modDia modal-open" id='<?php echo $codDia8; ?>' href="#modalDiario" >
                                      <?php echo $data8 ?>    
                                    </div><br><br> 
                                    <?php } ?>
                                  </div>
                                </li>
                              </ul>
                            </div>
                          </li>
                        <?php } ?>
                      </ul>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
          <?php } ?>
        </ul>
    </div>
</div>
<!-- MODAL -->
<div id="modalDiario" class="modal modal-fixed-footer">
    <div class="modal-content">

      <h4>Registro Personale &nbsp;&nbsp;&nbsp;&nbsp;<span id="span-data-diario"></span></h4>
      <div class="container">
        <table class="highlight centered">
          <tr>
            <td class="head-diario" width="40%">
              Tipo Attività
            </td>
            <td>
              <span id="span-tipo-att-diario"></span>
              <a class="btn tooltipped" data-position="bottom" data-delay="50" data-tooltip="<ul>
                <li><b>[A]</b> accoglienza in azienda e descrizione del ruolo del Tutor Aziendale dei  contenuti del Tirocinio/Stage</li><br>
                <li><b>[B]</b> descrizione dell’attività e dell’organizzazione aziendale (descrizione del posto di lavoro, dei mezzi<br> di produzione assegnati, degli    
         elementi di prevenzione adottati e dei dispositivi di protezione individuale)<br>e descrizione dei processi di competenza del ruolo</li><br>
              <li><b>[C]</b> esercitazioni pratico-operative</li><br>
              <li><b>[D]</b> verifica e valutazione dell’apprendimento</li>
              </ul>">?</a>
            </td>
          </tr>
          <tr>
            <td class="head-diario">
              Ore
            </td>
            <td>
              <div id="ore-diario"></div>
            </td>
          </tr>
          <tr>
            <td class="head-diario">
              Descrizione
            </td>
          </tr>
          <tr>
            <td>
              <div id="div-descr-diario"></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  <div class="modal-footer">
    <button class="modal-action modal-close waves-effect waves-green btn-flat ">Chiudi</button>
  </div>
</div>
<?php } ?>
<?php if (strpos($_SESSION['permessi'], "VAZ") !== false) { ?>
<div id="3aziende" class="col s12">
    <div class="container">
        <br>
        <h5>Aziende | Info Aziende | Alunni</h5>
        <br>
        <ul class="collapsible popout" data-collapsible="accordion">
          <?php
              $query10 = "SELECT azienda.CodAz, azienda.Nome FROM azienda"; 
              $result10 = mysqli_query($connection, $query10);
              if (!$result10) {
                  die ('Invalid query: ' . mysql_error());
              }
              while($row10 = mysqli_fetch_array($result10, MYSQLI_NUM)){
                  $id10 = $row10[0];
                  $nome10 = $row10[1];
          ?>
          <li>
            <div class="collapsible-header" >
              <i class="material-icons">work</i><span><?php echo $nome10 ?></span>
            </div>
            <div class="collapsible-body">
              <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header">
                     <i class="material-icons">format_list_bulleted</i> Info Azienda
                    </div>
                    <div class="collapsible-body">
                      <?php
                          $query11 = "SELECT a.SedeTirocinio, a.PIVA, a.NomeRap, a.Tel, a.EMail, a.SedeLegale FROM azienda AS a WHERE a.CodAz = {$id10}"; 
                          $result11 = mysqli_query($connection, $query11);
                          if (!$result11) {
                              die ('Invalid query: ' . mysql_error());
                          }
                          if ($row11 = mysqli_fetch_array($result11, MYSQLI_NUM)){
                              $piva11 = $row11[1];
                              $rap11 = $row11[2];
                              $tel11 = $row11[3];
                              $email11 = $row11[4];
                              $sedeLeg11 = $row11[5];
                              $sedeTir11 = $row11[0];

                            $query11 = "SELECT ta.nome, ta.cognome,ta.Tel, ta.EMail, ta.CodFisc, ta.DataNasc FROM tutor_aziendale as ta WHERE ta.FKAz = {$id10}"; 
                            $result11 = mysqli_query($connection, $query11);
                            if (!$result11) {
                                die ('Invalid query: ' . mysql_error());
                            }
                            if ($row11 = mysqli_fetch_array($result11, MYSQLI_NUM)){
                              $nometa11 = $row11[0] . " " . $row11[1];
                              $tatel11 = $row11[2];
                              $taemail11 = $row11[3];
                              $tacf11 = $row11[4];
                              $tadata11 = $row11[5];
                            } else {
                              $nometa11 = "";
                              $tatel11 = "";
                              $taemail11 = "";
                              $tacf11 = "";
                              $tadata11 = "";
                            }
                      ?>
                      <b>P. IVA</b>: <?php echo $piva11 ?><br>
                      <b>Rappresentante Legale</b>: <?php echo $piva11 ?><br>
                      <b>Tutor Aziendale</b>: <?php echo $nometa11 ?><br>
                      <b>Telefono</b>: <?php echo $tel11 ?><br>
                      <b>E-Mail</b>: <?php echo $email11 ?><br>

                      <?php 
                        if ($sedeTir11 != null) { 
                      ?>
                          <b>Sede Tirocinio:</b> <?php echo $sedeTir11 ?><br>
                          <b>Sede Legale:</b> <?php echo $sedeLeg11 ?><br>
                      <?php 
                        } else { 
                      ?>
                          <b>Sede Legale (e dei Tirocini): </b><?php echo $sedeLeg11 ?><br>
                      <?php } ?>

                    </div>
                    <?php }
                    ?>
                  </li>
                  <?php 
                    if (!empty($nometa11) && $nometa11 != null) {
                      ?>
                  <li>
                    <div class="collapsible-header">
                      <i class="material-icons">account_circle</i> Tutor Aziendale
                    </div>
                    <div class="collapsible-body">
                      <b>Nome</b>: <?php echo $nometa11 ?><br>
                      <b>Telefono</b>: <?php echo $tatel11 ?><br>
                      <b>E-mail</b>: <?php echo $taemail11 ?><br>
                      <b>Codice Fiscale</b>: <?php echo $tacf11 ?><br>
                      <b>Data Nascita</b>: <?php echo $tadata11 ?><br>
                    </div>
                  </li>
                    <?php   
                      }
                    ?>
                  <li>
                    <div class="collapsible-header">
                        Alunni
                    </div>
                    <div class="collapsible-body">
                      <table>
                        <?php
                          $query12 = "SELECT al.nome, al.cognome, t.Inizio  FROM alunno AS al, tirocinio AS t, azienda AS a WHERE al.CodAlu = t.FKAlu AND t.FKAz = {$id10} AND t.FKAz = a.CodAz ORDER BY al.cognome"; 
                          $result12 = mysqli_query($connection, $query12);
                          if (!$result12) {
                              die ('Invalid query: ' . mysql_error());
                          }
                          while($row12 = mysqli_fetch_array($result12, MYSQLI_NUM)){
                              $nome12 = $row12[0];
                              $cogn12 = $row12[1];
                              $dataIn12 = $row12[2];
                          ?>
                          <tr>
                            <td><b><?php echo $cogn12 ?></b></td>
                            <td><?php echo $nome12 ?></td>
                            <td><?php echo $dataIn12 ?></td>
                          </tr>
                        <?php } ?>
                        </table>
                    </div>
                  </li>    
                </ul> 
            </div> <!-- /coll-body -->
          </li>
        <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>
<?php if (strpos($_SESSION['permessi'], "VTUTSC") !== false) { ?>
<div id="4tutsc" class="col s12">
    <div class="container">
        <br>
        <h5>Tutor Scolastici | Classi</h5>
        <br>
        <ul class="collapsible popout" data-collapsible="accordion">
          <?php
              $queryGetTut2 = "SELECT * FROM tutor_scolastico"; 
              $resultTut2 = mysqli_query($connection, $queryGetTut2);
              if (!$resultTut2) {
                  die ('Invalid query: ' . mysql_error());
              }
              while($rowTut2 = mysqli_fetch_array($resultTut2, MYSQLI_NUM)){
                  $idTut2 = $rowTut2[0];
                  $nomeTut2 = $rowTut2[1];
                  $cogTut2 = $rowTut2[2];
                  $cfTut2 = $rowTut2[3];
          ?>
          <li>
            <div class="collapsible-header" >
              <i class="material-icons">account_circle</i> 
              <span style="width:50%;"><?php echo "<b>" . $cogTut2 . "</b> " . $nomeTut2 ?></span>
              <span style="width:50%;"><?php echo $cfTut2 ?></span>
            </div>
            <div class="collapsible-body">
            <ul style="list-style-type: circle !important;">  
              <?php
                  $queryGetClas2 = "SELECT classe.CodClas, classe.NomeClasse FROM classe WHERE classe.FKTutSc = {$idTut2}"; 
                  $resultClas2 = mysqli_query($connection, $queryGetClas2);
                  if (!$resultClas2) {
                      die ('Invalid query: ' . mysql_error());
                  }
                  while($rowClas2 = mysqli_fetch_array($resultClas2, MYSQLI_NUM)){
                      $idClas2 = $rowClas2[0];
                      $nomeClasse2 = $rowClas2[1];
                  ?>
                  <li><?php echo $nomeClasse2 ?></li>
                <?php } ?>
              </ul> 
            </div>
          </li>
        <?php } ?>
        </ul>
    </div>
</div>
<?php } ?>
<?php require("../server/sideNavBottom.php"); ?>
    <script src="../assets/js/view_js.js"></script>
    <script src="../assets/js/view_ajax.js"></script>
    <?php if ($_SESSION['tipoUt'] !== "ospite") { ?> <script src="../assets/js/changep_aj.js"></script> <?php } ?>
    </body>
</html>
<?php } ?>