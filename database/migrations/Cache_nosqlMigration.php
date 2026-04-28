<?php

    namespace database\migrations;

    use \Facades\Config;

    use \Core\Datatables;

    class Cache_nosqlMigration
    {
        public static function up()
        {

            Config::env();
            $conn = Datatables::getInstance()->getConnection();

            $conn->exec("CREATE TABLE `cache_nosql` (
                    `id` int NOT NULL AUTO_INCREMENT,
                    `chave` varchar(191) NOT NULL,
                    `minutes` varchar(19) NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `expires` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`id`),
                    UNIQUE KEY `chave` (`chave`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci");

            $db = "Omium";

            $stmt = $conn->query("SELECT * FROM ".$db.".users");
            $user = $stmt->fetchAll();
            if($user == [])
            {
                echo "Table users successfully created".PHP_EOL; 
            }
            if(sizeof($user)!=0)
            {
                echo "Table users already up".PHP_EOL; 
            }    
            die();
        }
    }            