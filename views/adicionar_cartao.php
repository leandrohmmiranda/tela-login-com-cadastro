<?php
require_once('config.php');

// Verificar a sessão de autenticação
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numero = $_POST['numero'];
    $bandeira = $_POST['bandeira'];

    $sql = "INSERT INTO cartoes (numero, bandeira, usuario_email) VALUES ('$numero', '$bandeira', '" . $_SESSION['email'] . "')";
    $conexao->query($sql);

    // Redirecionar de volta para a página de cartões após adicionar um novo cartão
    header('Location: index.php');
}
$pageTitle = "Adicionar Cartão de Crédito";
$content = __FILE__;
include("layout.php");
?>
<h1>Adicionar Cartão de Crédito</h1>
<form method="post" action="adicionar_cartao.php">
    <label for="numero">Número do Cartão:</label>
    <input type="text" name="numero" required><br>

    <label for="bandeira">Bandeira:</label>
    <input type="text" name="bandeira" required><br>

    <input type="submit" value="Adicionar Cartão">
</form>
<br>
<a href="index.php">Voltar para seus cartões</a>