<?
  $conn = mysql_connect("localhost","root","123") ; //configure os dados do seu MySQL
  $banco = mysql_select_db("comercio");


global $login;
global $senha1;
$login= $_POST['login'];
$senha1 = $_POST['senha1'];
//faz a confirma��o de nome e senha no db
$logar = mysql_query("SELECT * FROM admin WHERE login='$login' AND senha='$senha1' AND codigo='1'") or die("erro ao selecionar");
/*aqui depois de verificado redirecionamos a pagina secreta(caso nome e senha estarem corretos) ou senha
e apelido n�o conferem caso tais estiverem errados. Repare que h� uma rotina para o valor inserido em senha n�o seja nulo.

obs: Aonde esta escrito paginasecreta.php � aonde vc deve colocar a p�gina para onde o script ira redirecionar*/
if (strlen($senha1)< 1)


echo '
Senha ou apelido n�o conferem
tente denovo

';
session_start("login");
//session_destroy();




elseif (mysql_num_rows($logar)>0 ){
setcookie("senha_admin", "$senha1");
header("location: admin.php");

} else {
 echo "
Senha ou apelido n�o conferem
<a href=\"loginadm.php\">tente de novo</a>

";
}
 mysql_close($conexao);

?>


