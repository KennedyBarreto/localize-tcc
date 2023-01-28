<?

require("conexao.php");

$busca = "Select * FROM viewstotal";
$exe = mysqli_query($conexao,$busca);

$resultado = (mysqli_fetch_array($exe));
$numero = $resultado['views'];

$visitantes = $numero + 1;
$altera = "UPDATE viewstotal SET views = '$visitantes' WHERE views = '$numero'";
$exe1 = mysqli_query($conexao,$altera);

$exe = mysqli_query($conexao,$busca);
$total = (mysqli_fetch_array($exe));
$views = $total['views'];

echo "Visitas: $views";

?>
