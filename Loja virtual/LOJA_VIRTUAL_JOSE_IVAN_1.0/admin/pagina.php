<?
$sql = mysql_query("SELECT * FROM usuarios");

$lpp = 10; // Especifique quantos resultados voc� quer por p�gina
$total = mysql_num_rows($sql); // Esta fun��o ir� retornar o total de linhas na tabela
$paginas = ceil($total / $lpp); // Retorna o total de p�ginas
if(!isset($pagina)) { $pagina = 0; } // Especifica uma valor para variavel pagina caso a mesma n�o esteja setada
$inicio = $pagina * $lpp; // Retorna qual ser� a primeira linha a ser mostrada no MySQL
$sql = mysql_query("SELECT * FROM usuarios LIMIT $inicio, $lpp"); // Executa a query no MySQL com o limite de linhas.

while($l = mysql_fetch_array($sql)) {
   echo "Resultado...
n";
}

if($pagina > 0) {
   $menos = $pagina - 1;
   $url = "$PHP_SELF?pagina=$menos";
   echo "<a href="$url">Anterior</a>"; // Vai para a p�gina anterior
}
for($i=0;$i<$paginas;$i++) { // Gera um loop com o link para as p�ginas
   $url = "$PHP_SELF?pagina=$i";
   echo " | <a href="$url">$i</a>";
}
if($pagina < ($paginas - 1)) {
   $mais = $pagina + 1;
   $url = "$PHP_SELF?pagina=$mais";
   echo " | <a href="$url">Pr�xima</a>";
}
?>


