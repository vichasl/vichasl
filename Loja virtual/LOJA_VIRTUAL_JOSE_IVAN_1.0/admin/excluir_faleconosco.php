<?php
   include ("../conecta.php");
if (getenv("REQUEST_METHOD") == "GET") {
   // Configura as vari�veis do m�todo POST para virarem vari�veis
   // "normais" do PHP (Requer apenas nas vers�es do PHP acima da 4.1)
   $id = $_GET['id'];

//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
$id = trim($id);


$sql = "DELETE FROM faleconosco WHERE id='$id'";
$resultado = mysql_query($sql)
or die ("N�o foi poss�vel realizar a exclus�o dos dados.");
echo "<h1>O relat�rio foi excluido com �xito!</h1>";
echo "<br><a href=\"controle_faleconosco.php\">voltar</a>";
 }

?>

