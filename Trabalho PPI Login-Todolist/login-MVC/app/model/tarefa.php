<?php 

require_once __DIR__ . '/../config/database.php';

class Tarefa {
    private $conn; 

    public function __construct() {
        $db = new Database();
        $this->conn = $db->conectar();
    }

    // Listar apenas as tarefas do usuário logado
    public function listar($usuarioId) {
        $tarefas = []; 
        $sql = "SELECT * FROM tarefas WHERE usuario_id = ? ORDER BY data_criacao DESC"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado && $resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $tarefas[] = $row; 
            }
        }

        return $tarefas; 
    }

    // Criar vinculando ao usuario_id
    public function criar($descricao, $usuarioId) {
        $sql = "INSERT INTO tarefas (descricao, usuario_id) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("si", $descricao, $usuarioId);
        return $stmt->execute();
    }

    // Excluir garantindo que a tarefa pertence ao usuário
    public function excluir($id, $usuarioId) {
        $id = intval($id);
        $sql = "DELETE FROM tarefas WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ii", $id, $usuarioId);
        return $stmt->execute();
    }

    // Editar garantindo que a tarefa pertence ao usuário
    public function editar($descricao, $id, $usuarioId) {
        $id = intval($id);
        $sql = "UPDATE tarefas SET descricao = ? WHERE id = ? AND usuario_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sii", $descricao, $id, $usuarioId);
        return $stmt->execute();
    }
}
?>