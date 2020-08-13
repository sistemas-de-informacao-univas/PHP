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

    <tr>
	
	<?php

		// Entrada de dados (formulario HTML, JS)
		// Com 2 arquivos, sendo: 
		// 1 - Metodo de Envio (formulario.html)
		// 2 - Metodo de Recebimento (mensagem.php)

		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$novidades = $_POST['novidades'];
		$mensagem = $_POST['mensagem'];
	
        echo '<td>'.$nome.'</td>
			  <td>'.$telefone.'</td>
			  <td>'.$email.'</td>        
			  <td>'.$novidades.'</td>
			  <td>'.$mensagem.'</td>
			  <td></td>';
	
	?>
    </tr></table>
    <p align=center> <a href="formulario.html">Voltar</a></p>
</body>
</html>