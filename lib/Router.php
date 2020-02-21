<?php
namespace cmrweb;
class Router
{
    private static $url;
    function __construct()
    {
        if (isset($_GET['url'])) {
            self::$url = explode('/', $_GET['url']);
        }
    }
    public static function route($routes)
    {
        if(!in_array(self::$url[0],array_keys($routes))){   
            require "erreur.php";
        }else
        foreach ($routes as $route => $file) {
        
                if (self::$url[0] == "{$route}" && empty(self::$url[1])) {
                    if(file_exists("vue/style/$file.css"));
                    echo "<link rel='stylesheet' href='vue/style/$file.css'>";
                    Vue::template("model/m_$file.php","vue/$file.html", "controller/c_$file.php");
                } elseif (self::$url[0] == "{$route}" && !empty(self::$url[1])) {
                    $id = self::$url[1];
                    if(file_exists("vue/style/$file.css"));
                    echo "<link rel='stylesheet' href='web/pages/style/$file.css'>";
                    Vue::template("model/m_$file.php","vue/$file.html", "controller/c_$file.php");
                }

        }
    }
    
}
