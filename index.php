<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmrTemplate engine</title>
</head>
<body>

<?php
require_once "vendor/autoload.php";
use cmrweb\Router;
Router::route([
    ""=>"index",
    "home"=>"index"
]);
?>

<script src="lib/cmrfor.js"></script>
</body>
</html>