<?php
// Array com dados
$cliente1 = array(
    'codigo'   => '001',
    'nome'     => 'William',
    'telefones' => array(
        'residencial' => '011 4125-6352',
        'celular' => '011 9999-5241'
    )
);

$cliente2 = array(
    'codigo'   => '002',
    'nome'     => 'Adriano',
    'telefones' => array(
        'residencial' => '011 4125-635',
        'celular' => '011 9999-9652'
    )
);

$cliente3 = array(
    'codigo'   => '003',
    'nome'     => 'Maria',
    'telefones' => array(
        'residencial' => '011 4444-6352',
        'celular' => '011 9999-1245'
    )
);

// Atribui os 3 arrays apenas um array
$dados = array($cliente1, $cliente2, $cliente3);

// Adiciona o identificador "Contatos" aos dados
$dados_identificador = array('Contatos' => $dados);

// Tranforma o array $dados_identificador em JSON
$dados_json = json_encode($dados_identificador);

// Abre ou cria o arquivo contato.json
// "a" indicar que o arquivo é aberto para ser escrito
$fp = fopen("contatos.json", "a");
// Escreve o conteúdo JSON no arquivo
$escreve = fwrite($fp, $dados_json);

// Fecha o arquivo
fclose($fp);
?>
