<?php

require_once('config.php');

$conexao = mysqli_connect($host, $user, $pswd);

if (mysqli_connect_errno()) {
    echo "Erro na conexão com o banco de dados: ".mysqli_connect_error();
    exit();
}

$bd = mysqli_select_db($conexao, "mentoria_virtual") or die('Erro ao escolher o banco');

$sql = "SELECT id, description FROM citys where state_id in (6,7,8,9,10,11) ";

$resultado = mysqli_query($conexao, $sql) or die ('Erro ao executar a query');

echo '<table><tr><td>ID</td><td>Nome da cidade</td></tr>';
$i=1;
while ( $dados = mysqli_fetch_array($resultado)){
	$r = $i%2;
	if($r==0){$cor='grey';}else{$cor='white';}
	echo '<tr style="background-color:'.$cor.'"><td>'.$dados['id'].'</td><td>'.$dados['description'].'</td></tr>';
	$i++;
}
echo '</table>'
?>