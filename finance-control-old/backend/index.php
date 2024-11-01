<?php
require '../vendor/autoload.php';

$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
    case '/transacoes':
        break;
    case '/transacoes/adicionar':
        break;
    case '/transacoes/excluir':
        break;
    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
