<?php

$arquivo = file_get_contents("estados.json");

$dados = json_decode($arquivo);

foreach($dados as $linhas){
	echo " ID = ".$linhas->id;
	echo " Nome = ".$linhas->nome;
	echo " Sigla = ".$linhas->sigla;
	echo "<br>";
}

?>