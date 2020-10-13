
<?php 

	require_once("conexao.php");

	$arquivo = file_get_contents("cidades.json");

	$dados = json_decode($arquivo);

	foreach($dados as $linhas){
		$id = $linhas->id;
		$nome = str_replace("'", "´", $linhas->nome);
		$codigo = $linhas->codigo;
		$ddd = $linhas->ddd;
		$estado = $linhas->estado_id;
		
		$sql = "insert into cidades (id, nome, codigo, ddd, estado_id) values ($id, '$nome', $codigo, $ddd, $estado)";
		$resultado = mysqli_query($conexao, $sql);
		if(!$resultado){echo "Erro ao inserir o ID: ".$id. " - ".$sql."<br>";}
	}
	
	mysqli_close($conexao);

?>
