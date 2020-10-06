<?php

$disciplinas = [["nome"=>"Eng. Soft"],["nome"=>"Ling 6"],["nome"=>"redes"]];

echo json_encode($disciplinas);
echo '<br>';

$linguagens = [
				["nome"=>"JavaScript","abrev"=>"JS"],
				["nome"=>"PHP 7","abrev"=>"PHP"],
				["nome"=>"NodeJS","abrev"=>"Node"],
				["nome"=>"CSharp","abrev"=>"C#"]
			  ];

echo json_encode($linguagens);

?>
