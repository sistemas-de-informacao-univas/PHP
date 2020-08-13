
<?php
	// a utilização de 2 barras indica comentário no código

	// comandos de saida: ECHO, PRINT
	echo '<head></head><div><h1>Olá Mundo...</h1></div>';
	print "<br>Programa 01";
	
	// criação de variavel e atribuição de valor
	$i = 0;
	
	// comando condicional: IF ELSE
	if ($i>2) {
		echo '<br>1';
	}
	else
	{
		echo '<br>2';
	}

	// comando condicional: SWITCH CASE
	switch($i){
		case 1:
			echo '<br>1';
			break;
		case 2:
			echo '<br>2';
			break;
		default:
			echo '<br><br>outro<br>';
	}

	// comando de repetição: FOR (Para)
	for($i=1;$i<=10;$i++){
		echo $i.'<br>';
	}

	$b=1;
	
	// comando de repetição: WHILE (Enquanto)
	while($b<10){
		echo $b.'<br>';
		$b++;
	};

	$a=1;
	
	// comando de repetição: DO WHILE (Repita)
	do{
		echo $a.' aula<br>';
		$a++;
	}while($a<5);

?>




