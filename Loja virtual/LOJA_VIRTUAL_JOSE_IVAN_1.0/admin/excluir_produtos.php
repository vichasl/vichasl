<?php
   include ("conecta.php");
if (getenv("REQUEST_METHOD") == "GET") {
   // Configura as vari�veis do m�todo POST para virarem vari�veis
   // "normais" do PHP (Requer apenas nas vers�es do PHP acima da 4.1)
   $codigo = $_GET['codigo'];

//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
$codigo = trim($codigo);


$sql = "DELETE FROM produtos WHERE codigo='$codigo'";
$resultado = mysql_query($sql)
or die ("N�o foi poss�vel realizar a exclus�o dos dados.");
echo "<h1>O PRODUTO foi excluido!</h1>";
echo "<br><a href=\"controle_meus_produtos.php\">voltar</a>";
 }

?>

