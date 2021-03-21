<?php

$index = new IndexModel;
foreach ($index->getPost() as $key => $value) {
    $users[$key] = $value;
}
//var_dump($users);
$titre = "MVC";
$text = "routing + binding";
// $users = [
//     "nom" => "camara",
//     "prenom" => "enrique",
//     "age" => 34,
//     "email" => "contact@cmrweb.fr"
// ];
$paragraphe = "test variable";