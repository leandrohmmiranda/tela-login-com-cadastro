<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Leandro Miranda" />
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <!-- Barra de navegação comum a todas as páginas -->
    </header>

    <main>
        <?php include($content); ?>
    </main>

    <footer>
        <!-- Rodapé comum a todas as páginas -->
    </footer>
</body>

</html>