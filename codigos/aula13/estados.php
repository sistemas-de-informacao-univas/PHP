<?php 

	require_once("conexao.php");

	$sql = "select id, description as nome, acronyms as sigla from states where status = 1";
	$resultado = mysqli_query($conexao, $sql);
		
	while($dados = mysqli_fetch_array($resultado)){
		$str_array[] = $dados;
	}

	// Tranforma o array $dados em JSON
	$dados_json = json_encode($str_array);

	// O parâmetro "a" indica que o arquivo será aberto para escrita
	$fp = fopen("estados.json", "w+");

	// Escreve o conteúdo JSON no arquivo
	$escreve = fwrite($fp, $dados_json);

	// Fecha o arquivo
	fclose($fp);
	
	mysqli_close($conexao);

?>
