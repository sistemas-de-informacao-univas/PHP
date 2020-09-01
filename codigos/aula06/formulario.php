<?php

	require_once('conexao.php');
	
	$nome = '';
	$telefone = '';
	$email = '';
	$novidades = '';
	$mensagem = '';
	$id = '';
	
	if(isset($_GET['id']) && $_GET['id'] != ""){
		$sql = "select * from mensagens where id = ".$_GET['id'];
		$resultado = mysqli_query($conexao, $sql);
		if($resultado){
			$dados = mysqli_fetch_array($resultado);
			$nome = $dados['nome'];
			$telefone = $dados['telefone'];
			$email = $dados['email'];
			$novidades = $dados['novidades'];
			$mensagem = $dados['mensagem'];
			$id = $dados['id'];
		}
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Formulário HTML</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body background-color = "gray">
    <div width=60% align=center>
    <form class="formulario" method="post" action="mensagens.php" align=left> 
        <p> Envie uma mensagem preenchendo o formulário abaixo</p>
		
		<input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <div class="field">
            <label for="nome">Seu Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" placeholder="Digite seu nome*" required>
        </div>
        
        <div class="field">
            <label for="telefone">Seu Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?php echo $telefone; ?>" placeholder="Digite seu Telefone">
        </div>
 
        <div class="field">
            <label for="email">Seu E-Mail:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" placeholder="Digite seu E-Mail*" required>
        </div>        
        <div class="field radiobox">
            <span>Deseja receber nossas novidades?</span>
            <input type="radio" name="novidades" id="sim" value="sim" <?php if($novidades=='sim'){echo 'checked';} ?> ><label for="sim">Sim</label>
            <input type="radio" name="novidades" id="nao" value="nao" <?php if($novidades=='nao'){echo 'checked';} ?> ><label for="nao">Não</label>
        </div>
        <div class="field">
            <label for="mensagem">Sua mensagem:</label>
            <textarea name="mensagem" id="mensagem" placeholder="Mensagem*" required><?php echo $mensagem; ?></textarea>
        </div>
 
        <input type="submit" name="mensagens" value="Enviar">
    </form>
</div>
</body>
</html>