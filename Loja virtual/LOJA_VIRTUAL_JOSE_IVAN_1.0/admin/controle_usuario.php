

<?
 session_start() ;
if($_SESSION['qwert'] == false) {

      echo "Voc� precisa estar conectado para ver esta �rea<br>fa�a seu <a href=\"../login.php\">login</a>";
      }
      else {
echo "Ol�&nbsp;". $_SESSION["qwert"]."&nbsp&nbsp";
echo "<font face='Arial' size='2'>Confira abaixo, as areas configuraveis: <a href=\"logoutadmin.php\">sair</a></font>" ?>

<h1>Controle de USUARIOS</h1>
 <?
// Verifica se existe a vari�vel $comeco, que vai indicar a n�mero
// da mensagem que vai aparecer no come�o. Se n�o existir, assume-se
// que vai ser o come�o, ou seja, o valor 0.

  // Configura as vari�veis do m�todo POST para virarem vari�veis
   // "normais" do PHP (Requer apenas nas vers�es do PHP acima da 4.1)

global $begin;
if (!$begin) { $begin = 0; }
else {$begin = $_GET['begin'];}

// Conecta ao servidor e seleciona o banco de dados
 include ("../conecta.php");

// Coloca na vari�vel $total o n�mero total de mensagens no Guestbook
$query = "SELECT count(*) FROM usuarios";
$query = mysql_query($query,$conexao);
$query = mysql_fetch_array($query);
$total = $query[0];

?>
<p>
Total de usuarios cadastrados: <b><? echo $total; ?></b>

Exibindo <b>5</b> usuarios por pagina, mostrando noticias de
<b><? echo $begin+1; ?></b> a <b><? echo $begin+15; ?></b>.
</p>

<?

// Calcula os links para as pr�ximas mensagens e as anteriores, de
// acordo com o n�mero total de mensagens
if (($begin > 0) and ($begin <= 15)) {
   $anteriores = '<a href="controle_usuario.php?begin=0"><<<</a>';
} elseif (($begin > 0) and ($begin > 15)) {
   $anteriores = '<a href="controle_usuario.php?begin=' . ($begin-15) . '"><<<</a>';
} else {
   $anteriores = '<<<';
}

if (($begin < $total) and (($begin+15) >= $total)) {
   $proximas = '>>>';
} else {
   $proximas = '<a href="controle_usuario.php?begin=' . ($begin+15) . '">>>></a>';
}

echo $anteriores . " | " . $proximas."  | <A HREF=\"admin.php\">Pagina principal</a>" ;
echo " | <a href=\"logoutadmin.php\">Sair</a> | <A HREF=\"enviar_mensagem.php\">Enviar mensagem</a>";

// Faz uma consulta SQL trazendo as linhas das 10 ultimas mensagens
// que foram colocadas no livro de visitas.
$query = "SELECT * FROM usuarios ORDER BY codigo DESC LIMIT $begin,15";
$query = mysql_query($query,$conexao);

// Gera uma tabela para cada assinatura no livro de visitas (loop)
echo "<h2> Esta interface � uma pagina de administra��o de usuarios<b> Restrita</b></h2><br>";
echo "<form method=\"GET\" ACTION=\"excluir_usuario.php\">";
echo "<table width=\"100%\" border=1 cellpadding=1 cellspacing=1>";
echo "<tr>";
echo "<td >codigo:</td>";
echo "<td >nome:</td>";
echo "<td >email:</td>";
echo "<td >login:</td>";
echo "<td >senha:</td>";
echo "<td >ip:</td>";
echo "<td >endereco:</td>";
echo "<td >cidade:</td>";
echo "<td >estado:</td>";
echo "<td >autorizado:</td>";
echo "<td >A��o:</td>";
echo "</tr>";

while ($linha=mysql_fetch_array($query)) {
$codigo = $linha["codigo"];
$email = $linha["nome"];
$data = $linha["email"];
$login= $linha["login"];
$senha = $linha["senha"];
$ip= $linha["ip"];
$endereco = $linha["endereco"];
$cidade= $linha["cidade"];
$estado= $linha["estado"];
$autorizado= $linha["autorizado"];
     global $t;
     $t++;
    if ($t % 2 == 0) {$cor="#99ccff";}
    else             {$cor="#99cccc";}
      echo "<tr bgcolor='$cor'><td>$codigo</td>";
         echo "<td>$email</td>";
         echo "<td>$data</td>";
         echo "<td>$login</td>";
         echo "<td>$senha</td>";
          echo "<td>$ip</td>";
          echo "<td>$endereco</td>";
          echo "<td>$cidade</td>";
          echo "<td>$estado</td>";
          echo "<td>$autorizado</td>";

echo "<td ><a href=\"alterar_usuario.php?codigo=$codigo\">Alterar</a><br>";
echo "<a href=\"excluir_usuario.php?codigo=$codigo\">Excluir</a><br></td>";
echo "</tr>";
                                                    }
         echo "<input type=\"SUBMIT\" name=\"enviar\" value=\"Enviar\" ></form></table>\n";



 mysql_close($conexao);




}  ?>





