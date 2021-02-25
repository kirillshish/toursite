<?php
//автозагрузчик классов
//подключаю на каждой странице со скриптом где будут классы
spl_autoload_register(function($className)
{
    $appFolders = array(
        '../RussoTuristo/c/',
        '../RussoTuristo/m/',
        '../RussoTuristo/v/',
    );
    foreach($appFolders as $appFolder)
    {
        $filePath = $appFolder . $className . ".php.";
        if(file_exists($filePath)){
            include_once($filePath);
        }
    }
});
//переменные для БД
define('HOST','localhost');
define('USER','postgres');
define('PASS','');
define('DB_NAME','russoturisto');
define('PORT','5432');