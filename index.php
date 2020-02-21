<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmrTemplate engine</title>
</head>

<body>
    <header>
        <nav>
            <a href="./home">
                <h2>Accueil</h2>
            </a>
            <a href="./demo">
                <h2>Page Demo</h2>
            </a>
        </nav>
    </header>
    <main>
        <?php
        require_once "vendor/autoload.php";

        use cmrweb\Router;

        if (isset($_GET['url']))
            new Router($_GET['url']);
        Router::route([
            "" => "index",
            "home" => "index",
            "demo" => "test"
        ]);
        ?>
    </main>
    <footer>cmrweb<sup>&copy;</sup><?= date("Y") ?></footer>
    <script src="lib/cmrfor.js"></script>
</body>

</html>