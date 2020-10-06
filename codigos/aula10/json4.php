<?php

$arquivo = file_get_contents("cadastro.json");

$dados = json_decode($arquivo);

//var_dump($dados); 

foreach($dados as $linhas){
	echo " Codigo = ".$linhas->codigo;
	echo " Nome = ".$linhas->nome;
	echo " Telefone = ".$linhas->telefone;
	echo "<br>";
}

?>