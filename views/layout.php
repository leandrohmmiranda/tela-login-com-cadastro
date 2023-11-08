<!DOCTYPE html>
<html>

<head>
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