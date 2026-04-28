<?php

namespace Core;

use Facades\Config;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;

class Datatables 
{

    

    public  function getConnection()
    {
        switch(trim(getenv('DB_CONNECTION')))
        {
            case 'mysql ': 
            case 'mysql':
               return  $this->mysqlConn();
            break;
            case 'postgres':
                return $this->postgresConn();
            break;          
            case 'sqlserver';
                return $this->sqlserverConn();
            break;
        }
    }

    private function mysqlConn()
    {
       try 
       {
            $dsn = 'mysql:host='.trim(getenv('DB_HOST')).';dbname='.trim(getenv('DB_DATABASE'));
            $username = trim(getenv('DB_USERNAME'));
            $password = trim(getenv('DB_PASSWORD'));

            $pdo = new \PDO($dsn, $username, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage(); die('Connection failed');
        }
        return $pdo;
    }

    private function sqlserverConn()
    {
       try 
       {
            $dsn = 'sqlsrv:Server='.trim(getenv('DB_HOST')).';Database='.trim(getenv('DB_DATABASE'));
            $username = trim(getenv('DB_USERNAME'));
            $password = trim(getenv('DB_PASSWORD'));

            $pdo = new \PDO($dsn, $username, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage(); die('Connection failed');
        }
        return $pdo;
    }

    private function postgresConn()
    {
       try 
       {
            $dsn = 'pgsql:host='.trim(getenv('DB_HOST')).';dbname='.trim(getenv('DB_DATABASE'));
            $username = trim(getenv('DB_USERNAME'));
            $password = trim(getenv('DB_PASSWORD'));

            $pdo = new \PDO($dsn, $username, $password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch (\PDOException $e) 
        {
            echo "Connection failed: " . $e->getMessage(); die('Connection failed');
        }
        return $pdo;
    }

    

     public static function  getInstance()
    {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

    private static $instance = null;

}

?>