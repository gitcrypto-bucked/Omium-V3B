<?php


namespace database\migrations;

use \Facades\Config;

use \Core\Datatables;

class UserMigration
{
    public static function up()
    {

        Config::env();
        $conn = Datatables::getInstance()->getConnection();

        $conn->exec("CREATE TABLE IF NOT EXISTS `users` (
                    `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                    `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                    `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                    `email_verified_at` timestamp NULL DEFAULT NULL,
                    `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
                    `active` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '1',
                    `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    `last_activity` timestamp NULL DEFAULT NULL,
                    `admin` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
                    `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
                    PRIMARY KEY (`id`) USING BTREE,
                    UNIQUE KEY `email` (`email`) USING BTREE
                    ) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci");

        $stmt = $conn->query("SELECT * FROM ".getenv('DB_DATABASE').".users");
        $user = $stmt->fetchAll();
        if($user == [])
        {
            echo 'Table users successfully created'.PHP_EOL; 
        }
        if(sizeof($user)!=0)
        {
            echo 'Table users already up'.PHP_EOL; 
        }    
        die();

    }

    private $logger;
}

