<?php
require_once('config.php');

// Verifique a sessão de autenticação
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $bandeira = $_POST['bandeira'];

    // Execute a validação e inserção no banco de dados
    // Certifique-se de validar os dados do cartão, incluindo o número, data de validade, etc.
    $sql = "INSERT INTO cartoes (numero, bandeira, usuario_email) VALUES ('$numero', '$bandeira', '" . $_SESSION['email'] . "')";
    $conexao->query($sql);

    // Redirecione de volta para a página de cartões após adicionar um novo cartão
    header('Location: cartoes.php');
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Adicionar Cartão de Crédito</title>
</head>

<body>
    <h1>Adicionar Cartão de Crédito</h1>
    <form method="post" action="adicionar_cartao.php">
        <label for="numero">Número do Cartão:</label>
        <input type="text" name="numero" required><br>

        <label for="bandeira">Bandeira:</label>
        <input type="text" name="bandeira" required><br>

        <input type="submit" value="Adicionar Cartão">
    </form>
    <br>
    <a href="cartoes.php">Voltar para seus cartões</a>
</body>

</html>