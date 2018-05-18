<?php 
  require("../server/db_info.php"); 
  session_start();
  $connection = mysqli_connect ('localhost', $username, $password, $database);
  if (!$connection) {  die('Not connected : ' . mysqli_error()); }
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
                <a href="#" class="brand-logo"><i class="material-icons">work</i> AZIENDE</a></div>
            </div>
          </nav>
          <div class="compensatore"></div>

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
    <script src="../assets/js/view_js.js"></script>
    <script src="../assets/js/view_ajax.js"></script>
    <script src="../assets/js/changep_aj.js"></script>
    </body>
</html>