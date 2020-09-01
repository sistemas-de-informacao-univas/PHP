<?php

require_once('config.php');

// conexão com servidor
$conexao = mysqli_connect($host, $user, $pswd);

if (mysqli_connect_errno()) {
    echo "Erro na conexão com o banco de dados: ".mysqli_connect_error();
    exit();
}

$bd = mysqli_select_db($conexao, $bco) or die('Erro ao escolher o banco');
mysqli_set_charset($conexao, 'UTF-8');

?>