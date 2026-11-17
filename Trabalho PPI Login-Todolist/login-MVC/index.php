<?php
session_start();

require_once __DIR__ . '/app/controller/usuarioController.php';
require_once __DIR__ . '/app/controller/tarefaController.php';

$controllerUsuario = new UsuarioController();
$controllerTarefa = new TarefaController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'autenticar':
        $controllerUsuario->autenticar();
        break;

    case 'painel':
        $controllerUsuario->painel();
        break;

    case 'logout':
        $controllerUsuario->logout();
        break;

    case 'criar': 
        $controllerTarefa->criar(); 
        break;

    case 'excluir': 
        $controllerTarefa->excluir(); 
        break;

    case 'editar':
        $controllerTarefa->editar();
        break;

    default:
        $controllerUsuario->index();
        break;
}
?>