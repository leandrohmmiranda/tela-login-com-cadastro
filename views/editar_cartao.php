<?php
require_once('config.php');

// Verifique a sessão de autenticação
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $numero = $_POST['numero'];
    $bandeira = $_POST['bandeira'];

    // Execute a validação e atualização no banco de dados
    // Certifique-se de validar os dados do cartão, incluindo o número, data de validade, etc.
    $sql = "UPDATE cartoes SET numero = '$numero', bandeira = '$bandeira' WHERE id = $id";
    $conexao->query($sql);

    // Redirecione de volta para a página de cartões após editar o cartão
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    // Recupere os dados do cartão para edição
    $sql = "SELECT * FROM cartoes WHERE id = $id";
    $resultado = $conexao->query($sql);
    $cartao = $resultado->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Editar Cartão de Crédito</title>
</head>

<body>
    <h1>Editar Cartão de Crédito</h1>
    <form method="post" action="editar_cartao.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="numero">Número do Cartão:</label>
        <input type="text" name="numero" value="<?php echo $cartao['numero']; ?>" required><br>

        <label for="bandeira">Bandeira:</label>
        <input type="text" name="bandeira" value="<?php echo $cartao['bandeira']; ?>" required><br>

        <input type="submit" value="Salvar Alterações">
    </form>
    <br>
    <a href="index.php">Voltar para seus cartões</a>
</body>

</html>