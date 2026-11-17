<?php 

require_once __DIR__ . "/../model/usuario.php";
require_once __DIR__ . "/../model/tarefa.php";

class UsuarioController {

    private $usuarioModel;
    private $tarefaModel;
    
    public function __construct() {
        $this->usuarioModel = new Usuario();
        $this->tarefaModel = new Tarefa();
    }

    public function index() {
        if (isset($_SESSION['id'])) {
            header("Location: index.php?action=painel");
            exit;
        }
        include __DIR__ . '/../view/login.php';
    }

    public function autenticar() {
        if (!isset($_POST['email'], $_POST['senha'])) {
            header("Location: index.php");
            exit;
        }

        $email = trim($_POST['email']);
        $senha = $_POST['senha'];

        if (empty($email) || empty($senha)) {
            $erro = "Preencha corretamente seu email ou senha"; 
            include __DIR__ . '/../view/login.php';
            exit; 
        }

        $usuario = $this->usuarioModel->buscarPorEmail($email); 

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_regenerate_id(true); 

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: index.php?action=painel"); 
            exit;
        }

        $erro = "E-mail ou senha inválidos"; 
        include __DIR__ . '/../view/login.php';
    }

    public function painel() {
        if (!isset($_SESSION['id'])) {
            header("Location: index.php");
            exit;
        }

        // Busca apenas as tarefas do usuário que está logado na sessão
        $tarefas = $this->tarefaModel->listar($_SESSION['id']);

        include __DIR__ . "/../view/painel.php";
    }

    public function logout() {
        $_SESSION = [];
        session_destroy(); 

        header("Location: index.php");
        exit; 
    }
}
?>