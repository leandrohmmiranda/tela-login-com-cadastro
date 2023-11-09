<?php
require_once('config.php');

// Verificar a sessão de autenticação
session_start();

// Obter o caminho da URL após o domínio
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Mapear as rotas
switch ($path) {
    case '/login':
        include('views/login.php');
        break;
    case '/cadastro':
        include('views/cadastro.php');
        break;
    case '/cartoes':
        // Verificar a autenticação
        if (isset($_SESSION['email'])) {
            include('views/index.php');
        } else {
            header('Location: /login');
        }
        break;
    case '/adicionar-cartao':
        // Verificar a autenticação
        if (isset($_SESSION['email'])) {
            include('views/adicionar_cartao.php');
        } else {
            header('Location: /login');
        }
        break;
    case '/editar-cartao':
        // Verificar a autenticação
        if (isset($_SESSION['email'])) {
            include('views/editar_cartao.php');
        } else {
            header('Location: /login');
        }
        break;
    case '/excluir-cartao':
        // Verificar a autenticação
        if (isset($_SESSION['email'])) {
            include('views/excluir_cartao.php');
        } else {
            header('Location: /login');
        }
        break;
    case '/logout':
        // Encerrar a sessão e redirecionar para a página de login
        session_destroy();
        header('Location: /login');
        break;
    default:
        // Página não encontrada
        http_response_code(404);
        echo 'Página não encontrada';
        break;
}
