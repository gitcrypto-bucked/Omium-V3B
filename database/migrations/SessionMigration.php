<?php


namespace database\migrations;

use \Facades\Config;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use \Core\Datatables;

class SessionMigration
{
    public static function up()
    {
        Config::env();
        $conn = Datatables::getInstance()->getConnection();
       
        $conn->exec("CREATE TABLE `sessions` (
                            `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                            `sessid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                            `uagent` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
                            `user` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                            `expire` datetime DEFAULT NULL,
                            `active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
                            `data_criacao` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`) USING BTREE,
                            UNIQUE KEY `email` (`sessid`) USING BTREE
                            ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci"
                    );
        
      
        $stmt = $conn->query("SELECT * FROM ".getenv('DB_DATABASE').".sessions");
        $sessions = $stmt->fetchAll();
        if($sessions == [])
        {
            echo 'Table sessions successfully created'.PHP_EOL; 
        }
        if(sizeof($sessions)!=0)
        {
            echo 'Table sessions already up'.PHP_EOL; 
        }    
        die();

    }

    private $logger;
}

