<?php
namespace cmrweb;
class Router extends Vue
{
    private static $url;
    function __construct($url)
    {
        if (isset($url)) {
            self::$url = explode('/', $url);
        }
        return $this;
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
                    Parent::template("model/m_$file.php","vue/$file.html", "controller/c_$file.php");
                } elseif (self::$url[0] == "{$route}" && !empty(self::$url[1])) {
                    $id = self::$url[1];
                    if(file_exists("vue/style/$file.css"));
                    echo "<link rel='stylesheet' href='web/pages/style/$file.css'>";
                    Parent::template("model/m_$file.php","vue/$file.html", "controller/c_$file.php");
                }

        }
    }
    
}
