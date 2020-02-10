<?php
require_once "../Models/Connection.php";
require_once "../Models/Maps.php";

// Instanciando a classe Maps e buscando as informações da tabela Markers
// a partir do método find_maps_data()
$maps = new Maps;
$result = $maps->find_maps_data();
header("Content-type: text/xml; charset=utf-8");

echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = @mysqli_fetch_assoc($result)){

  // Add to XML document node
  echo '<marker ';
  echo 'name="' . $maps->parseToXML($row_markers['name']) . '" ';
  echo 'address="' . $maps->parseToXML($row_markers['address']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'type="' . $row_markers['type'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';