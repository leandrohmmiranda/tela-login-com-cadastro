<?php
require_once('config.php');

// Verificar a sessão de autenticação
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $numero = $_POST['numero'];
    $bandeira = $_POST['bandeira'];

    $sql = "UPDATE cartoes SET numero = '$numero', bandeira = '$bandeira' WHERE id = $id";
    $conexao->query($sql);

    // Redirecionar de volta para a página de cartões após editar o cartão
    header('Location: index.php');
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM cartoes WHERE id = $id";
    $resultado = $conexao->query($sql);
    $cartao = $resultado->fetch_assoc();
}
$pageTitle = "Editar Cartão de Crédito";
$content = __FILE__;
include("layout.php");
?>
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