<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bilheteria</title>
</head>
<body>
    <form method="post" action=""> 
        <b>Venda de bilhetes do Metro</b>
        - Tipo: <select name="tipo">
		  <option></option> 
		  <option>Unico 1.30</option> 
		  <option>Duplo 2.40</option>
		  <option>Dez 10.00</option>
		</select>
        - Valor recebido: <input type="text" name="dinheiro">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>

<?php
	
	if (isset($_POST['dinheiro']) && $_POST['dinheiro'] != ''){
		$tipo = $_POST['tipo'];
		$dinheiro = $_POST['dinheiro'];
		
		if ($tipo == "Unico 1.30"){ $preco = 1.3; }
		if ($tipo == "Duplo 2.40"){ $preco = 2.4; }
		if ($tipo == "Dez 10.00"){ $preco = 10; }
		
		$quantidade = (int)($dinheiro / $preco);
		$troco = $dinheiro - ($quantidade * $preco);
		
		echo '<br>Tipo de bilhete escolhido: '.$tipo;
		echo '<br>Valor entregue em dinheiro: '.number_format($dinheiro, 2, '.', '');
		echo '<br>Quantidade de bilhetes: '.$quantidade;
		echo '<br>Valor a devolver (troco): '.number_format($troco, 2, '.', '');
	}
       
?>

