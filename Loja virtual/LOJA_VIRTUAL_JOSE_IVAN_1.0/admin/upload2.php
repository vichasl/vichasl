<?
$erro = $config = array();

// Prepara a vari�vel do arquivo
$arquivo = isset($_FILES["foto"]) ? $_FILES["foto"] : FALSE;
     $campo1 = $_POST['campo1'];
   $campo2 = $_POST['campo2'];
   $campo3 = $_POST['campo3'];
   $campo4 = $_POST['campo4'];
   $campo5 = $_POST['campo5'];
   $campo6 = $_POST['campo6'];
   $campo7 = $_POST['campo7'];


//tirar espa�o em branco das variaveis recebidass atrav�s de formulario
  $campo1 = trim( $campo1);
  $campo2 = trim( $campo2);
  $campo3 = trim( $campo3);
  $campo4 = trim( $campo4);
  $campo5 = trim( $campo5);
  $campo6 = trim( $campo6);//preco
   $campo6= number_format($campo6, 2);//formata numero para padrao mysql
  $campo7 = trim( $campo7);

// Tamanho m�ximo do arquivo (em bytes)
$config["tamanho"] = 100000;
// Largura m�xima (pixels)
$config["largura"] = 350;
// Altura m�xima (pixels)
$config["altura"]  = 180;

// Formul�rio postado... executa as a��es
if($arquivo)
{
        // Verifica se o mime-type do arquivo � de imagem
    if(!eregi("^image\/(pjpeg|jpeg)$", $arquivo["type"]))
    {
        $erro[] = "Arquivo em formato inv�lido! A imagem deve ser jpg ou jpeg . Envie outro arquivo";
    }
    else
    {
        // Verifica tamanho do arquivo
        if($arquivo["size"] > $config["tamanho"])
        {
            $erro[] = "Arquivo em tamanho muito grande!
		A imagem deve ser de no m�ximo " . $config["tamanho"] . " bytes.
		Envie outro arquivo";
        }

        // Para verificar as dimens�es da imagem
        $tamanhos = getimagesize($arquivo["tmp_name"]);

        // Verifica largura
        if($tamanhos[0] > $config["largura"])
        {
            $erro[] = "Largura da imagem n�o deve
				ultrapassar " . $config["largura"] . " pixels";
        }

        // Verifica altura
        if($tamanhos[1] > $config["altura"])
        {
            $erro[] = "Altura da imagem n�o deve
				ultrapassar " . $config["altura"] . " pixels";
        }
    }

    // Imprime as mensagens de erro
    if(sizeof($erro))
    {
        foreach($erro as $err)
        {
            echo " - " . $err . "<BR>";
        }

        echo "<a href=\"foto.php\">Fazer Upload de Outra Imagem</a>";
    }

    // Verifica��o de dados OK, nenhum erro ocorrido, executa ent�o o upload...
    else
    {
        // Pega extens�o do arquivo
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

        // Gera um nome �nico para a imagem
        $imagem_nome = $arquivo["name"];

        // Caminho de onde a imagem ficar�
        $imagem_dir = "..//images/" . $imagem_nome;

        // Faz o upload da imagem
        move_uploaded_file($arquivo["tmp_name"], $imagem_dir);
        include ("conecta.php");
        $sql = "INSERT INTO produtos(codigo,id,id_filho,fabricante,produto,preco,imagem,autorizado,detalhes) VALUES('',$campo2,'$campo3','$campo4','$campo5','$campo6','images/$imagem_nome','sim','$campo7')";
       //Agora � hora de contatar o mysql

      //Inserindo os dados
       $resultado = mysql_query($sql)
or die ("Houve erro na grava��o dos dados, por favor, clique em voltar e verifique os campos obrigat�rios!");
      echo '<b>Foi transferido com sucesso seu arquivo</b>';
     echo "<BR>Brevemente publicaremos ele.<B>MUITO OBRIGADO</B><br>
     deseja <a href=\"foto.php\">transferir outro arquivo</a><br>
     <a href=\"admin.php\">Voltar para Administra��o</a>";
     mysql_close($conexao);
    }
}
?>

