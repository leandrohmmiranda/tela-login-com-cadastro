<?php
require_once('config.php');

// Verificar a sessão de autenticação
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Função para listar cartões
function listarCartoes($conexao, $email)
{
    $sql = "SELECT * FROM cartoes WHERE usuario_email = '$email'";
    $resultado = $conexao->query($sql);

    echo "<h1>Seus Cartões de Crédito</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Número</th><th>Bandeira</th><th>Ações</th></tr>";

    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['numero'] . "</td>";
        echo "<td>" . $row['bandeira'] . "</td>";
        echo "<td><a href='editar_cartao.php?id=" . $row['id'] . "'>Editar</a> | <a href='excluir_cartao.php?id=" . $row['id'] . "'>Excluir</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "<a href='adicionar_cartao.php'>Adicionar Cartão</a>";
}

// Exibir a Lista de cartões
listarCartoes($conexao, $_SESSION['email']);

$pageTitle = "Lista de cartões";
$content = __FILE__;
include("layout.php");
?>
<h1>Cartões de Crédito</h1>
<br>
<a href="logout.php">Sair</a>