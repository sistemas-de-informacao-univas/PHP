
<?php

	require_once('conexao.php');

	if(isset($_POST['nome']) && $_POST['nome'] != ""){

		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$novidades = $_POST['novidades'];
		$mensagem = $_POST['mensagem'];

		$sql = "insert into mensagens (nome, telefone, email, novidades, mensagem,   reg_datahora, alt_datahora)
				values ('$nome', '$telefone', '$email', '$novidades', '$mensagem', now(), '')
		";

		$resultado = mysqli_query($conexao, $sql);

		if ($resultado){
			echo 'Dados inseridos com sucesso';
			$_POST = null;
		}else{
			echo 'Falha ao inserir a mensagem';
		}
	}
 
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mensagens Enviadas</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    <h2 align=center> Mensagens Recebidas:</h2>
    <p align=center> <a href="formulario.html">Voltar</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="nome">Nome:</label></td>
        <td><label for="telefone">Telefone:</label></td>
        <td><label for="email">E-Mail:</label></td>        
        <td><span>Receber novidades?</span></td>
        <td><label for="mensagem">Mensagem:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select * from mensagens ";
		$resultado = mysqli_query($conexao, $sql);

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['nome'].'</td>
				  <td>'.$dados['telefone'].'</td>
				  <td>'.$dados['email'].'</td>        
				  <td>'.$dados['novidades'].'</td>
				  <td>'.$dados['mensagem'].'</td>
				  <td></td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="formulario.html">Voltar</a></p>
</body>
</html>