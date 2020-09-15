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

	if(isset($_GET['pagina']) && $_GET['pagina']!=""){
		$pagina = $_GET['pagina']-1;
	}else{
		$pagina = 0;
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

<table border=1 width=80% align=center><tr>
        <td><label for="nome">Cidade:</label></td>
        <td><label for="telefone">CEP:</label></td>
        <td><label for="email">Estado:</label></td>        
        <td><label for="acoes">Ações</label></td>
    </tr>

    
    <?php
    	$sql = "select c.id, c.description, c.code, s.description from citys as c inner join states as s on c.state_id = s.id where c.state_id = ".$estado;
		$resultado = mysqli_query($conexao, $sql);

		$total_cidades = mysqli_num_rows($resultado);
		$numero_paginas = ceil($total_cidades/20);
		$limite = $pagina * 20;

		
		echo '<br><br>';

		$sql = $sql.' limit '.$limite.', 20';
		$resultado = mysqli_query($conexao, $sql);

		while($dados = mysqli_fetch_array($resultado)){
			echo '<tr><td>'.$dados[1].'</td>
				  <td>'.$dados[2].'</td>
				  <td>'.$dados[3].'</td>        
				  <td>
					<a href="excluir.php?id='.$dados['id'].'">Excluir</a>
					<a href="formulario.php?id='.$dados['id'].'">Alterar</a>
				  </td></tr>';
		}

		echo '</table><br>Total de cidades: '.$total_cidades.'  -   Páginas: ';

		for($i=1;$i<=$numero_paginas;$i++){
			echo '&nbsp;<a href="http://localhost/aula08/cidades.php?estado='.$estado.'&pagina='.$i.'">'.$i.'</a>';
		}

		mysqli_close($conexao);

	?>



</body></html>