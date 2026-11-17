<?php 

require_once __DIR__ . '/../model/tarefa.php';

class TarefaController {
    private $tarefaModel; 

    public function __construct() {
        $this->tarefaModel = new Tarefa(); 
    }

    public function index() {
        header("Location: index.php?action=painel");
        exit;
    }

    public function criar() {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao']))) {
            $this->tarefaModel->criar(trim($_POST['descricao']), $_SESSION['id']);
        }

        header("Location: index.php?action=painel");
        exit;
    }

    public function excluir() {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_GET['id'])) {
            $this->tarefaModel->excluir($_GET['id'], $_SESSION['id']);
        }

        header("Location: index.php?action=painel"); 
        exit;
    }

    public function editar() {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        if (isset($_POST['descricao']) && !empty(trim($_POST['descricao'])) && isset($_POST['id'])) {
            $this->tarefaModel->editar(trim($_POST['descricao']), $_POST['id'], $_SESSION['id']);
        }

        header("Location: index.php?action=painel");
        exit;
    }
}
?>