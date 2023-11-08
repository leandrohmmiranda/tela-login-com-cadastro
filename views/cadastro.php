<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $celular = $_POST['celular'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $data_nasc = $_POST['data_nasc'];
    $cep = $_POST['cep'];

    $sql = "INSERT INTO usuarios (email, senha, celular, cpf_cnpj, data_nasc, cep) VALUES ('$email', '$senha', '$celular', '$cpf_cnpj', '$data_nasc', '$cep')";
    $conexao->query($sql);

    // Redirecione o usuário para a página de login
    header('Location: login.php');
}
$pageTitle = "Página de Cadastro";
$content = __FILE__;
include("layout.php");
?>
<form method="post" action="cadastro.php">
    <label for="email">E-mail:</label>
    <input type="email" name="email" required><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" required><br>

    <label for="celular">Celular:</label>
    <input type="text" name="celular" required><br>

    <label for="cpf_cnpj">CPF/CNPJ:</label>
    <input type="text" name="cpf_cnpj" required><br>

    <label for="data_nasc">Data de Nascimento:</label>
    <input type="text" name="data_nasc" required><br>

    <label for="cep">CEP:</label>
    <input type="text" name="cep" required><br>

    <input type="submit" value="Cadastrar">
</form>