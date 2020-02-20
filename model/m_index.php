<?php
$pdo = new PDO("mysql:host=localhost;dbname=cmrweb","root","");
$req = $pdo->prepare("SELECT * FROM post");
$req->execute();
$result = $req->fetchAll(PDO::FETCH_ASSOC);

