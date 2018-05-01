<?php 
  require("../server/db_info.php"); 
  $connection=mysqli_connect ('localhost', $username, $password, $database);
  if (!$connection) {  die('Not connected : ' . mysql_error());}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>Mappa Alternanza</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Inserimento ">
    <meta name="author" content="Ludovico Venturi & Luca Moroni">

    <link rel="icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../lib/materialize/materialize.min.css">
    <link rel="stylesheet" href="../lib/material_icons/mat_icons.css">
    <link rel="stylesheet" href="../assets/css/style_map.css">
    
    <script src="../lib/jquery.js"></script>
    <script src="../lib/materialize/materialize.min.js"></script>
    <script src="../assets/js/map_js.js"></script>
	</head>
    
<body class="body-map">
	<script>
   var map;
   var gmarkers=[];
   var asso = Array();
    var cou = 1;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(42.5633500, 12.6432900),
            zoom: 10,
            disableDefaultUI: true,
            scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infoWindow = new google.maps.InfoWindow;

      // Change this depending on the name of your PHP or XML file
        downloadUrl('../server/map_xml.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
        var id = markerElem.getAttribute('id');
        var name = markerElem.getAttribute('name');
        var rap = markerElem.getAttribute('rap');
        var sede = markerElem.getAttribute('sede');
        var point = new google.maps.LatLng(
            parseFloat(markerElem.getAttribute('lat')),
            parseFloat(markerElem.getAttribute('lng'))
        );
        var tel = markerElem.getAttribute('tel');
        var email = markerElem.getAttribute('email');

        var marker = new google.maps.Marker({
            map: map,
            position: point,
            label: {text: name, color: "black"},
        });

          asso[cou] = id;
            cou = cou+1 ;
            var contentString = "<strong>Nome Azienda:</strong> " + name + "<br> <strong>Rappresentante:</strong> " + rap + "<br>" + "<strong>Telefono:</strong> " + tel + "<br>" + "<strong>Sede:</strong> " + sede;


        var infowincontent = new google.maps.InfoWindow({
          content: contentString
        });



          gmarkers.push(marker);
          marker.addListener('click', function() {
              infowincontent.open(map, marker);
          });
          marker.addListener('mouseleave', function() {
              infowincontent.close(map, marker);
          });
        });
      });
    }

  function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
      if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request, request.status);
      }
    };

    request.open('GET', url, true);
    request.send(null);
  }

    function doNothing() {}

</script>

		<div class="wrapper wrapper--map">
			<div id="header" class="wrapper__header">
              <nav>
                <div style="background-color: #00cc00" class="nav-wrapper">
                  <div class="col s6">
                    <div class="brand-logo"><i class="material-icons">map</i> Mappa Alternanza</div>
                  </div>
                  <a href="../index.html" class="col s3 offset-s6" id="home"><i class="material-icons">home</i></a>
                </div>
              </nav>
			</div>
			<div id="map" class="wrapper__map">
			</div>
            <div class="">          
          			<div id="alunni" class="alunni">
                  <div class="viewer tooltipped" data-position="top" data-delay="50" data-tooltip="Clicca per vedere tutti gli alunni"><img src="../assets/img/freccia.png" /></div>
                  <div class="conttable">
                  <div style="height: 50px;"></div>
                <table class="striped bordered">
                  <tbody id="subalu">
                  
                  <?php
                  $queryGetData= "SELECT alunno.Nome, alunno.Cognome, classe.CodClas, azienda.CodAz, azienda.nome FROM azienda, tirocinio, alunno, classe WHERE azienda.CodAz = tirocinio.FkAz AND alunno.CodAlu = tirocinio.FkAlu AND alunno.FkClasse = classe.CodClas GROUP BY azienda.CodAz, alunno.Nome, alunno.Cognome ORDER BY alunno.cognome ASC";
                  $result = mysqli_query($connection, $queryGetData);
                  if (!$result) {
                    die('Invalid query: ' . mysql_error());
                  }
                      while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
                          $name = $row[0];
                          $surname = $row[1];
                          $clas = $row[2];
                          $azienda = $row[3];
                          $azNome = $row[4];
                  ?>
                  <tr data-id="<?php echo $azienda;?>">
                      <td width="20%"><?php echo $name;?></td>
                      <td width="20%"><?php echo $surname; ?></td>
                      <td width="20%"><?php echo $clas;?></td>
                      <td><?php echo $azNome;?></td>
                  </tr>          

                <?php } ?>
                  </tbody>
                </table>
                </div>
            </div>
        </div>
		</div>

        <script src="js/jquery-3.3.1.min.js"></script>
        <script async defer>
            
            var list_items = $("#subalu").find('tr');//restituisce un array
                   
        
            $( document ).ready(function() {
                setTimeout(function(){ 
                    setEListener();                    
                }, 3000);
                
            });
                        
            function setEListener(){

                $.each(list_items, function(ind, val){
                    var appoid = $(this).data("id");
                    console.log(appoid);
                    list_items[ind].addEventListener('click', function() {
                        
                        console.log(gmarkers.length);

                        for(var i=0; i<gmarkers.length; i++){
                            google.maps.event.trigger(gmarkers[i], 'mouseleave');
                            console.log(gmarkers[i]);
                        }

                        var mark = gmarkers[asso[$(this).data("id")]-1]; 

                        map.panTo(mark.getPosition());

                        google.maps.event.trigger(mark, 'click');
                    });
                });   
            }  
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQ29sfofxKQHtHRMDlE5KjQgTTrGvj_VY&callback=initMap">
        </script>
	</body>
</html>

