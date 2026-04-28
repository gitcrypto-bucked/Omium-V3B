<?php

    namespace database\migrations;

    use \Facades\Config;

    use \Core\Datatables;

    class User_permissionMigration
    {
        public static function up()
        {

            Config::env();
            $conn = Datatables::getInstance()->getConnection();

            $conn->exec("CREATE TABLE `user_permission` (
                        `id` bigint unsigned NOT NULL AUTO_INCREMENT,
                        `user_id` bigint unsigned NOT NULL,
                        `dash` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT (_utf8mb4'0'),
                        `blog` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT (_utf8mb4'0'),
                        `admin` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
                        PRIMARY KEY (`id`),
                        UNIQUE KEY `user_id` (`user_id`),
                        CONSTRAINT `fk_user_permission_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
                        ) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci");

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