<?php
// Configurações de conexão com o banco de dados
$servername = "localhost";  // ou o endereço do seu servidor de banco de dados
$username = "root";         // usuário do banco de dados
$password = "";             // senha do banco de dados
$dbname = "sa_felipe";      // nome do banco de dados

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];

    // Verifica se os campos não estão vazios
    if (!empty($nome) && !empty($usuario) && !empty($senha) && !empty($nivel)) {
        
        // Faz o hash da senha (recomendado para segurança)
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Preparar a consulta SQL para inserção
        $sql = "INSERT INTO login (nome, usuario, senha) VALUES ($nome, $usuario, $senha, $nivel)";

        // Preparar a declaração para evitar SQL Injection
        if ($stmt = $conn->prepare($sql)) {
            // Vincular os parâmetros
            $stmt->bind_param("ssss", $nome, $usuario, $senha_hash);

            // Executar a consulta
            if ($stmt->execute()) {
                echo "<p style='color:green;'>Funcionário cadastrado com sucesso!</p>";
            } else {
                echo "<p style='color:red;'>Erro ao cadastrar funcionário: " . $stmt->error . "</p>";
            }

            // Fechar a declaração
            $stmt->close();
        } else {
            echo "<p style='color:red;'>Erro ao preparar a consulta: " . $conn->error . "</p>";
        }

    } else {
        echo "<p style='color:red;'>Todos os campos são obrigatórios!</p>";
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
