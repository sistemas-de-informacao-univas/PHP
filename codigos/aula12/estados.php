
<?php 

	require_once("conexao.php");

	$arquivo = file_get_contents("estados.json");

	$dados = json_decode($arquivo);

	foreach($dados as $linhas){
		$id = $linhas->id;
		$nome = $linhas->nome;
		$sigla = $linhas->sigla;
		
		$sql = "insert into estados (id, nome, sigla) values ($id, '$nome', '$sigla')";
		$resultado = mysqli_query($conexao, $sql);
		if(!$resultado){echo "Erro ao inserir o ID: ".$id. " - ".$sql.'<br>';}
	}
	
	mysqli_close($conexao);

?>
