<!--
select id, description from states where status = 1

select description from citys where state_id = 2
-->

<script>
	function submitjs(){
		document.locais.submit();
	}
</script>

<?php

	require_once("conexao.php");

	if(isset($_GET['estado']) && $_GET['estado']!=""){
		$estado = $_GET['estado'];
	}else{
		$estado = 0;
	}

	if(isset($_GET['cidade']) && $_GET['cidade']!=""){
		$cidade = $_GET['cidade'];
	}else{
		$cidade = 0;
	}

?>

<html><body>

<form action="" method="get" name="locais">
	Estado: 
	<select name="estado" onchange="submitjs()">

		<?php 
			$sql = "select id, description, acronyms from states where status = 1";
			$resultado = mysqli_query($conexao, $sql);
			
			if($estado==0){
				echo '<option value="0" selected >Escolha um estado</option>';
			}else{
				echo '<option value="0" >Escolha um estado</option>';
			}
			
			while($dados = mysqli_fetch_array($resultado)){

				if($estado==$dados[0]){
					echo '<option value="'.$dados[0].'" selected>'.$dados[1].'</option>';
					$sigla_estado = $dados[2];
				}else{
					echo '<option value="'.$dados[0].'">'.$dados[1].'</option>';
				}
				
			}
		?>

	</select>
	<br>
	Cidade: 
	<select name="cidade" onchange="submitjs()">

		<?php 
			$sql = "select id, description from citys where state_id = ".$estado;
			$resultado = mysqli_query($conexao, $sql);
			
			while($dados = mysqli_fetch_array($resultado)){

				if($cidade==$dados[0]){
					echo '<option value="'.$dados[0].'" selected>'.$dados[1].'</option>';
					$nome_cidade = $dados[1];
				}else{
					echo '<option value="'.$dados[0].'">'.$dados[1].'</option>';
				}
				
			}
		?>

	</select>
</form>
<br><br>
Resultado da escolha é = <?php echo $nome_cidade."/".$sigla_estado; ?>

</body></html>