<?php 

namespace App\Core;

use PDO;
use PDOException;
use RuntimeException;

final class DB{
private static ?PDO $instance=null;
    
public static function getConnection():PDO{
    if(self::$instance == null){
        $config=require __DIR__.'/../Config/config.php';
        try{
            self::$instance= new PDO($config['dsn'],
            $config['user'], $config['password'],[
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES=> false,
            ]);
        }catch(PDOException $e){
            die($e->getMessage()); //error_log($e->getMessage())
        }
        catch(RuntimeException $e){
            die($e->getMessage()); //error_log($e->getMessage())
        }
    }
    return self::$instance;
    }

}