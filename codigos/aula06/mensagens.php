
<?php

	require_once('conexao.php');

	if(isset($_POST['nome']) && $_POST['nome'] != ""){

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$novidades = $_POST['novidades'];
		$mensagem = $_POST['mensagem'];

		if($id == ""){
			$sql = "insert into mensagens (nome, telefone, email, novidades, mensagem, reg_datahora, alt_datahora)
				values ('$nome', '$telefone', '$email', '$novidades', '$mensagem', now(), '')
			";
		}else{
			$sql = "update mensagens set nome = '$nome', telefone = '$telefone', email = '$email', novidades = '$novidades', mensagem = '$mensagem', alt_datahora = NOW()
					where id = ".$id;
		}
		
		$resultado = mysqli_query($conexao, $sql);

		if ($resultado && $id==""){
			$_GET['msg'] = 'Dados inseridos com sucesso';
			$_POST = null;
		}elseif($resultado && $id!=""){
			$_GET['msg'] = 'Dados alterados com sucesso';
			$_POST = null;
		}elseif(!$resultado){
			$_GET['msg'] = 'Falha ao inserir a mensagem';
		}
	}
	
	if(isset($_GET['msg']) && $_GET['msg'] != ""){
		echo $_GET['msg'];
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
    <p align=center> <a href="formulario.php">Cadastrar</a></p>

    <table border=1 width=80% align=center><tr>
        <td><label for="nome">Nome:</label></td>
        <td><label for="telefone">Telefone:</label></td>
        <td><label for="email">E-Mail:</label></td>        
        <td><span>Receber novidades?</span></td>
        <td><label for="mensagem">Mensagem:</label></td>
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select id, nome, email, telefone, novidades, mensagem from mensagens ";
		$resultado = mysqli_query($conexao, $sql);

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados['nome'].'</td>
				  <td>'.$dados['telefone'].'</td>
				  <td>'.$dados['email'].'</td>        
				  <td>'.$dados['novidades'].'</td>
				  <td>'.$dados['mensagem'].'</td>
				  <td>
					<a href="excluir.php?id='.$dados['id'].'">Excluir</a>
					<a href="formulario.php?id='.$dados['id'].'">Alterar</a>
				  </td></tr>';
		}

		mysqli_close($conexao);

	?>

    </table>
    <p align=center> <a href="formulario.php">Cadastrar</a></p>
</body>
</html>