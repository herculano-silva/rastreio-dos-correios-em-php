<?php

// AUTOLOAD DO COMPOSER
require __DIR__.'/vendor/autoload.php';

// DEPENDENCIAS DO ARQUIVO
use App\WebService\Correios\Rastreio;

// EXECULTA A REQUISIÇÃO NA API DOS CORREIOS
$response = isset($_POST['codigo']) ?
            Rastreio::consultarRastreio($_POST['codigo']) :
            null;

// CABEÇALHO DA PÁGINA
include __DIR__.'/includes/header.php';

// CONTEUDO DA PÁGINA
include isset($response['objetos']) ? 
            __DIR__.'/includes/result.php' :
            __DIR__.'/includes/form.php';

// RODAPE DA PÁGINA
include __DIR__.'/includes/footer.php';






// CABEÇALHO DA PÁGINA
// include __DIR__.'includes/result.php';
