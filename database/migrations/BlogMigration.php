<?php

namespace database\migrations;

use \Facades\Config;

use \Core\Datatables;

class BlogMigration
{
    public static function up()
    {

        Config::env();
        $conn = Datatables::getInstance()->getConnection();

        $conn->exec("CREATE TABLE `blog` (
                    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                    `titulo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                    `subtitulo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
                    `thumb` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                    `data_criacao` timestamp NULL DEFAULT NULL,
                    `active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
                    PRIMARY KEY (`id`) USING BTREE
                    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci");

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