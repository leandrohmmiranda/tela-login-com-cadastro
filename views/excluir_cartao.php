<?php
require_once('config.php');

// Verificar a sessão de autenticação
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$id = $_GET['id'];

// Excluir o cartão do banco de dados
$sql = "DELETE FROM cartoes WHERE id = $id";
$conexao->query($sql);

// Redirecionar de volta para a página de cartões após excluir o cartão
header('Location: index.php');