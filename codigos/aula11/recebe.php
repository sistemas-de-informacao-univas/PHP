<?php

$nome = $_GET['nome'];
$senha = $_GET['senha'];

$dados = $nome.' '.$senha.' \\n';

$arquivo = fopen("registro.txt","a");
$escreve = fwrite($arquivo, $dados);
fclose($arquivo);

?>