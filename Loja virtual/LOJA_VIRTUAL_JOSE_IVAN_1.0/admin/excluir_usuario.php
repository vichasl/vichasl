<?php
  session_start() ;
if($_SESSION['qwert'] == false) {

      echo "Voc� precisa estar conectado para ver esta �rea<br>fa�a seu <a href=\"../login.php\">login</a>";
      }
      else {
echo "Ol�&nbsp;". $_SESSION["qwert"]."&nbsp&nbsp";
echo "<font face='Arial' size='2'>Confira abaixo, as areas configuraveis: <a href=\"logoutadmin.php\">sair</a></font>" ;
   include ("../conecta.php");
if (getenv("REQUEST_METHOD") == "GET") {
    $codigo = $_GET['codigo'];

//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
$codigo = trim($codigo);




$sql = "DELETE FROM usuarios WHERE codigo='$codigo'";
$resultado = mysql_query($sql)
or die ("N�o foi poss�vel realizar a exclus�o dos dados.");

echo "<h1>O usuario foi exclu�do com �xito!</h1>";
echo "<br><a href=\"controle_usuario.php\">voltar</a>";
 }
 
 }

?>

