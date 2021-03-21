<?php
namespace cmrweb;
use PDO;
class DBmvc
{
    static private $pdo;
    static protected $result;
    function __construct()
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=cmrweb","root","");
        return self::$pdo;
    }
    static function select($select,$from)
    {
        $req = self::$pdo->prepare("SELECT $select FROM $from");
        $req->execute();
        self::$result = $req->fetchAll(PDO::FETCH_OBJ);
        return self::$result;
    }

}