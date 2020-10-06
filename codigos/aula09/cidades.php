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

	if(isset($_GET['letra']) && $_GET['letra']!=""){
		$letra = $_GET['letra'];
	}else{
		$letra = "";
	}

	$total_cidades = 0;

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

</form>

    
    <?php

    	$sql = "SELECT distinct substring(description,1,1) FROM citys 		where state_id = ".$estado." order by description asc";

		$resultado = mysqli_query($conexao, $sql);
		
		echo '<br>Filtro: ';
		while($dados = mysqli_fetch_array($resultado)){
			if($letra == ""){
				$letra=$dados[0]; 
			}
			echo '&nbsp;<a href="http://localhost/aula09/cidades.php?estado='.$estado.'&letra='.$dados[0].'">'.$dados[0].'</a>';
		}

		$sql = "select c.id, c.description, c.code, s.description from citys as c inner join states as s on c.state_id = s.id 
    		where c.state_id = ".$estado." order by c.description asc";
		$resultado = mysqli_query($conexao, $sql);

		$total_cidades_geral = mysqli_num_rows($resultado);


    	$sql = "select c.id, c.description, c.code, s.description from citys as c inner join states as s on c.state_id = s.id 
    		where c.state_id = ".$estado." and substring(c.description,1,1) = '".$letra."' order by c.description asc";
		$resultado = mysqli_query($conexao, $sql);

		$total_cidades = mysqli_num_rows($resultado);

		echo '<br><br>
				<table border=1 width=80% align=center><tr>
			        <td><label for="nome">Cidade:</label></td>
			        <td><label for="telefone">CEP:</label></td>
			        <td><label for="email">Estado:</label></td>        
			        <td><label for="acoes">Ações</label></td>
			    </tr>
		';

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados[1].'</td>
				  <td>'.$dados[2].'</td>
				  <td>'.$dados[3].'</td>        
				  <td>
					<a href="excluir.php?id='.$dados['id'].'">Excluir</a>
					<a href="formulario.php?id='.$dados['id'].'">Alterar</a>
				  </td></tr>';
		}

		echo '<table><br>Total de Cidades: '.$total_cidades." / ".$total_cidades_geral;

		mysqli_close($conexao);

	?>



</body></html>