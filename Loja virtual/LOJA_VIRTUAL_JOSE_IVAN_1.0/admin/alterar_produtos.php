<?
  if(session_is_registered("qwert") == false) {

      echo "Voc� precisa estar conectado para ver esta �rea<br>fa�a seu <a href=\"login.php\">login</a>";
      }
else {
$campo1='codigo';
$campo2='categoria';
$campo3='subcategoria';
$campo4='fabricante';
$campo5='produto';
$campo6='preco';
$campo7='imagem';
$campo8='disponivel';
$campo9='detalhes';



echo "Ol�&nbsp;". $_SESSION["qwert"]?>
<script type="text/javascript">
function validaCampo()
{
if(document.cadastro.nome.value=="")
{
alert("O Campo nome � obrigat�rio!");
return false;
}
else
if(document.cadastro.icpf.value=="")
{
alert("O Campo CPF � obrigat�rio!");
return false;
}
else
if(document.cadastro.email.value=="")
{
alert("O Campo email � obrigat�rio!");
return false;
}
else
if(document.cadastro.endereco.value=="")
{
alert("O Campo endere�o � obrigat�rio!");
return false;
}
else
if(document.cadastro.cidade.value=="")
{
alert("O Campo Cidade � obrigat�rio!");
return false;
}
else
if(document.cadastro.estado.value=="")
{
alert("O Campo Estado � obrigat�rio!");
return false;
}
else
if(document.cadastro.bairro.value=="")
{
alert("O Campo Bairro � obrigat�rio!");
return false;
}

else
if(document.cadastro.pais.value=="")
{
alert("O Campo pa�s � obrigat�rio!");
return false;
}
else
if(document.cadastro.login.value=="")
{
alert("O Campo Login � obrigat�rio!");
return false;
}
else
if(document.cadastro.senha.value=="")
{
alert("Digite uma senha!");
return false;
}
else
return true;
}

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}

<!-- Fim do JavaScript que validar� os campos obrigat�rios! -->

function mascara(o,f){
    v_obj=o
    v_fun=f
    setTimeout("execmascara()",1)
}

function execmascara(){
    v_obj.value=v_fun(v_obj.value)
}

function leech(v){
    v=v.replace(/o/gi,"0")
    v=v.replace(/i/gi,"1")
    v=v.replace(/z/gi,"2")
    v=v.replace(/e/gi,"3")
    v=v.replace(/a/gi,"4")
    v=v.replace(/s/gi,"5")
    v=v.replace(/t/gi,"7")
    return v
}

function soNumeros(v){
    return v.replace(/\D/g,"")
}

function telefone(v){
    v=v.replace(/\D/g,"")                 //Remove tudo o que n�o � d�gito
    v=v.replace(/^(\d\d)(\d)/g,"($1) $2") //Coloca par�nteses em volta dos dois primeiros d�gitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca h�fen entre o quarto e o quinto d�gitos
    return v
}

function cpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que n�o � d�gito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto d�gitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto d�gitos
                                             //de novo (para o segundo bloco de n�meros)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um h�fen entre o terceiro e o quarto d�gitos
    return v
}

function cep(v){
     v=v.replace(/\D/g,"")                //Remove tudo o que n�o � d�gito
    v=v.replace(/^(\d{5})(\d)/,"$1-$2") //Esse � t�o f�cil que n�o merece explica��es
    return v
}

function cnpj(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que n�o � d�gito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro d�gitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto d�gitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono d�gitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um h�fen depois do bloco de quatro d�gitos
    return v
}

function romanos(v){
    v=v.toUpperCase()             //Mai�sculas
    v=v.replace(/[^IVXLCDM]/g,"") //Remove tudo o que n�o for I, V, X, L, C, D ou M
    //Essa � complicada! Copiei daqui: http://www.diveintopython.org/refactoring/refactoring.html
    while(v.replace(/^M{0,4}(CM|CD|D?C{0,3})(XC|XL|L?X{0,3})(IX|IV|V?I{0,3})$/,"")!="")
        v=v.replace(/.$/,"")
    return v
}

function site(v){
    //Esse sem comentarios para que voc� entenda sozinho ;-)
    v=v.replace(/^http:\/\/?/,"")
    dominio=v
    caminho=""
    if(v.indexOf("/")>-1)
        dominio=v.split("/")[0]
        caminho=v.replace(/[^\/]*/,"")
    dominio=dominio.replace(/[^\w\.\+-:@]/g,"")
    caminho=caminho.replace(/[^\w\d\+-@:\?&=%\(\)\.]/g,"")
    caminho=caminho.replace(/([\?&])=/,"$1")
    if(caminho!="")dominio=dominio.replace(/\.+$/,"")
    v="http://"+dominio+caminho
    return v
}

</script>

<?php
    include ("conecta.php");
$tabela="produtos";
if (getenv("REQUEST_METHOD") == "GET") {
   // Configura as vari�veis do m�todo POST para virarem vari�veis
   // "normais" do PHP (Requer apenas nas vers�es do PHP acima da 4.1)
   $codigo= $_GET['codigo'];

//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
$codigo = trim($codigo);


$sql =mysql_query("SELECT * FROM $tabela WHERE codigo='$codigo'");

}
while($dados=mysql_fetch_array ($sql, MYSQL_NUM)) {
$nome0 = $dados[0]; //codigo
$nome1 = $dados[1]; //id
$nome2 = $dados[2]; //id_filho
$nome3 = $dados[3]; //fabricante
$nome4 = $dados[4]; //produto
$nome5 = $dados[5]; //preco
$nome5 = explode(".", $nome5);
echo $nome5[0]; // piece1
echo $nome5[1]; // piece2
$nome5_american =   number_format($nome5, 2, ',', '.');
$nome6 = $dados[6]; //imagem
$nome7= $dados[7];  //autorizado
$nome8= $dados[8];  //detalhes

echo "<h1>Alterar PRODUTOS...</h1>";
echo "<table border='0' width='auto'>
<form action=\"alterar_produtos_db.php?codigo=$nome0\" method=\"post\">
<tr>
  <td>$campo1</td>
  <td><input name='campo1' type='text' value='$nome0' size=10><br></td>
</tr>
<tr>
  <td>$campo2</td>
  <td><input name='campo2' type='text' value='$nome1' size=10></td>
</tr>
<tr>
  <td>$campo3</td>
  <td><input name='campo3' type='text' value='$nome2' size=10></td>
</tr>
<tr>
  <td>$campo4</td>
  <td><input name='campo4' type='text' value='$nome3' size=20></td>
</tr>
<tr>
  <td>$campo5</td>
  <td><input name='campo5' type='text' value='$nome4' size=20></td>
</tr>
<tr>
  <td>$campo6</td>
  <td>R$ <input type='text' name='preco_decimal' onkeypress=mascara(this,soNumeros) size=5 MAXLENGTH='5' value=$nome5[0]>,<input type='text' name='preco_centavos' onkeypress=mascara(this,soNumeros) size=2 MAXLENGTH='2' value=$nome5[1]></td>
</tr>
<tr>
  <td>$campo9</td>
  <td><textarea rows=2 cols=20 name='campo9'>
$nome8</textarea></td>
</tr>
<tr>
  <td><input hidden name='campo7' value='$nome6'></td>
  <td><img src=\"../mini.php?imagem=$nome6\"></td>
</tr>
<tr>
  <td>AUTORIZAR</td>
  <td><SELECT NAME=\"campo8\">
<OPTION>sim
<OPTION >nao
</SELECT></td>
</tr>
<tr>
  <td colspan='2' align='center'><input type='submit'></td>
</tr>
</table> ";
}
 mysql_free_result($sql);
 mysql_close($conexao);
    ?>



<? }  ?>

