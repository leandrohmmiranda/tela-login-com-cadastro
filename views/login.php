<?php
require_once('config.php');
// * cookie e cripto senha
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        // Login bem-sucedido. Redirecionar o usuário para a página de gerenciamento de cartões de crédito
        header('Location: index.php');
    } else {
        echo "Credenciais inválidas";
    }
}
$pageTitle = "Página de Login";
$content = __FILE__;
include("layout.php");
?>
<form method="post" action="login.php">
    <label for="email">E-mail:</label>
    <input type="email" name="email" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required><br>

    <input type="submit" value="Entrar">
</form>