<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>RN VIDROS PARA DECORAR</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="text.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="FFD9ED" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<img src="images/logo.gif" width="300" height="61">


<?
     include ("conecta.php");
if (getenv("REQUEST_METHOD") == "GET") {
   // Configura as vari�veis do m�todo POST para virarem vari�veis
   // "normais" do PHP (Requer apenas nas vers�es do PHP acima da 4.1)
   $codigo= $_GET['codigo'];

//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
$codigo = trim($codigo);


$sql = "SELECT * FROM produtos WHERE codigo='$codigo'";
$resultado = mysql_query($sql)
or die ("N�o foi poss�vel realizar a consulta ao banco de dados");
}
while ($linha=mysql_fetch_array($resultado)) {
$codigo= $linha["codigo"];
$endereco = $linha["endereco"];
$disponivel = $linha["disponivel"];
echo "<center><img SRC=\"images/$endereco\" alt=\"$codigo\">";
echo "<hr><h4>$disponivel</h4><br>
<A HREF=\"javascript:window.history.go(-1)\">Voltar</a></center>";
 }
?>
</body>

