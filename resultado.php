<?php
require("conexaomapa.php");

function parseToXML($htmlStr){
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

// Select all the rows in the markers table
$result_markers = "SELECT * FROM comercio";
$resultado_markers = mysqli_query($conn, $result_markers);

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row_markers = mysqli_fetch_assoc($resultado_markers)){
  // Add to XML document node
  echo '<marker ';
  echo 'nomecomercio="' . parseToXML($row_markers['nomecomercio']) . '" ';
  echo 'rua="' . parseToXML($row_markers['rua']) . '" ';
  echo 'lat="' . $row_markers['lat'] . '" ';
  echo 'lng="' . $row_markers['lng'] . '" ';
  echo 'categoria="' . $row_markers['categoria'] . '" ';
  echo 'numero="' . $row_markers['numero'] . '" ';
  echo 'telefone="' . $row_markers['telefone'] . '" ';
  echo 'abertura="' . $row_markers['abertura'] . '" ';
  echo 'fechamento="' . $row_markers['fechamento'] . '" ';
  echo 'bairro="' . $row_markers['bairro'] . '" ';
  echo 'cnpj="' . $row_markers['cnpj'] . '" ';
  echo 'diasfun="' . $row_markers['diasfun'] . '" ';
  echo 'id_comercio="' . $row_markers['id_comercio'] . '" ';
  echo 'id_usuario="' . $row_markers['id_usuario'] . '" ';
  echo '/>';
}

// End XML file
echo '</markers>';



