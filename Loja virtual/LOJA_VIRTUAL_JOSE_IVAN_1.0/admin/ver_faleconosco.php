
<? include ("topo.html"); ?><br>
  <?
  if (empty($HTTP_COOKIE_VARS["admin"]) or empty($HTTP_COOKIE_VARS["senha_admin"])) {

      echo "Voc� precisa estar conectado para ver esta �rea<br>fa�a seu <a href=\"loginadm.php\">login</a>";
      }
else {
echo "Ol� ";
echo $HTTP_COOKIE_VARS["admin"]."<br>"; ?>
<?php
    include ("../conecta.php");
if (getenv("REQUEST_METHOD") == "GET") {
   // Configura as vari�veis do m�todo POST para virarem vari�veis
   // "normais" do PHP (Requer apenas nas vers�es do PHP acima da 4.1)
   $id = $_GET['id'];

//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
$id = trim($id);


$sql = "SELECT * FROM faleconosco WHERE id='$id'";
$resultado = mysql_query($sql)
or die ("N�o foi poss�vel realizar a consulta ao banco de dados");
}
while ($linha=mysql_fetch_array($resultado)) {
$id = $linha["id"];
$data = $linha["data"];
$texto = $linha["texto"];


echo "<h1>Visualiza��o do texto de contato...</h1>";
echo "<hr><br>";
echo "C�digo do Formul�rio:$id<br>";
echo "Data: $data<br>";
echo "Texto:$texto<br>";

echo "<a href=\"controle_faleconosco.php\">voltar</a>";
}
 mysql_close($conexao);
?>


<? }  ?>

