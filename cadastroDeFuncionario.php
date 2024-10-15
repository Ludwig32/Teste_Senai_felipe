<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionário</title>
</head>
<body>
    <h2>Cadastro de Funcionário</h2>
    <form action="cadastro_funcionario.php" method="POST">
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="usuario">Usuário:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <select id="nivel" name="tipo_usuario" required>
            <option value="1">Funcionário</option>
            <option value="2">Administrador</option>
        </select>

        <input type="submit" value="Cadastrar">
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe os dados do formulário
        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        // Validação simples dos dados (pode ser aprimorada)
        if (empty($nome) || empty($usuario) || empty($senha)) {
            echo "<p style='color:red;'>Todos os campos são obrigatórios!</p>";
        } else {
            // Aqui você pode adicionar o código para salvar os dados no banco de dados

            echo "<p style='color:green;'>Funcionário cadastrado com sucesso!</p>";
            // Exibe os dados para conferência (opcional, remover em produção)
            echo "<p>Nome: $nome</p>";
            echo "<p>Usuário: $usuario</p>";
        }
    }
    ?>
</body>
</html>
