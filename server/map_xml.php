<?php

  date_default_timezone_set(date_default_timezone_get());

  require("db_info.php");

  // Start XML file, create parent node

  $dom = new DOMDocument("1.0");
  $node = $dom->createElement("markers");
  $parnode = $dom->appendChild($node);

  // Opens a connection to a MySQL server

  $connection=mysqli_connect ('localhost', $username, $password, $database);
  if (!$connection) {  die('Not connected : ' . mysql_error());}

  $query = "SELECT * FROM azienda WHERE 1";
  $result = mysqli_query($connection, $query);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }

  header("Content-type: text/xml");

  // Iterate through the rows, adding XML nodes for each

    while ($row = @mysqli_fetch_assoc($result)){
      // Add to XML document node
      $node = $dom->createElement("marker");
      $newnode = $parnode->appendChild($node);
      $newnode->setAttribute("id",$row['CodAz']);
      $newnode->setAttribute("name",$row['Nome']);
      $newnode->setAttribute("rap", $row['NomeRap']);
      $newnode->setAttribute("sede", $row['SedeLegale']);
      $newnode->setAttribute("lat", $row['Lat']);
      $newnode->setAttribute("lng", $row['Lon']);
      $newnode->setAttribute("tel", $row['Tel']);
      $newnode->setAttribute("email", $row['EMail']);
    }

  echo $dom->saveXML();

?>