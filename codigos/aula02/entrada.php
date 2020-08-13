<?php

		// Entrada de dados (formulario HTML, JS)
		// Metodo de Envio (form html)
		// Metodo de Recebimento (php)
		// Em Arquivo UNICO (entrada.php)
		
		echo '<br><br><br>
		      <table border=1 width=80% align=center><tr>
				<td><label for="nome">Nome:</label></td>
				<td><label for="telefone">Telefone:</label></td>
				<td><label for="email">E-Mail:</label></td>        
				<td><span>Receber novidades?</span></td>
				<td><label for="mensagem">Mensagem:</label></td>
				<td><label for="acoes">Ações</label></td>
			</tr>';

		if (isset($_POST['nome'])){
			$nome = $_POST['nome'];
			$telefone = $_POST['telefone'];
			$email = $_POST['email'];
			$novidades = $_POST['novidades'];
			$mensagem = $_POST['mensagem'];
			
			echo '<tr><td>'.$nome.'</td>
			  <td>'.$telefone.'</td>
			  <td>'.$email.'</td>        
			  <td>'.$novidades.'</td>
			  <td>'.$mensagem.'</td>
			  <td></td></tr>';
			  
		}
       
		echo '</table>';
	
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
    <form class="formulario" method="post" action="" align=left> 
        <p> Envie uma mensagem preenchendo o formulário abaixo</p>
        
        <div class="field">
            <label for="nome">Seu Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Digite seu nome*" required>
        </div>
        
        <div class="field">
            <label for="telefone">Seu Telefone:</label>
            <input type="text" id="telefone" name="telefone" placeholder="Digite seu Telefone">
        </div>
 
        <div class="field">
            <label for="email">Seu E-Mail:</label>
            <input type="email" id="email" name="email" placeholder="Digite seu E-Mail*" required>
        </div>        
        <div class="field radiobox">
            <span>Deseja receber nossas novidades?</span>
            <input type="radio" name="novidades" id="sim" value="sim" checked><label for="sim">Sim</label>
            <input type="radio" name="novidades" id="nao" value="nao"><label for="nao">Não</label>
        </div>
        <div class="field">
            <label for="mensagem">Sua mensagem:</label>
            <textarea name="mensagem" id="mensagem" placeholder="Mensagem*" required></textarea>
        </div>
 
        <input type="submit" name="mensagens" value="Enviar">
    </form>
</div>
</body>
</html>
