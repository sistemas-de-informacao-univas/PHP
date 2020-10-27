<?php 

	require_once("conexao.php");

	$sql = "select id, nome, sigla from estados";
	$resultado = mysqli_query($conexao, $sql);

	if($resultado){

		$registros = mysqli_num_rows($resultado);
		if($registros<1){
			echo '[{"erro":"<span style=\'color:red\'>Não há dados disponível para consulta</span>"}]';
		}else{

			while($dados = mysqli_fetch_array($resultado)){
				$str_array[] = $dados;
			}

			// Tranforma o array $dados em JSON
			echo json_encode($str_array, JSON_PRETTY_PRINT);
		}
	}else{
		echo '[{"erro":"<span style=\'color:red\'>Erro de acesso ao banco de dados</span>"}]';
	}
		

	mysqli_close($conexao);

?>
