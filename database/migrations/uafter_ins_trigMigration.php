<?php


namespace database\migrations;

use \Facades\Config;
use \Monolog\Logger;
use \Monolog\Handler\StreamHandler;
use Monolog\Formatter\JsonFormatter;
use \Core\Datatables;

class uafter_ins_trigMigration
{
    public static function up()
    {
        Config::env();
        $conn = Datatables::getInstance()->getConnection();
       
        $conn->exec("begin
                        insert into user_permission (user_id,dash,blog,admin) values ( new.id,'0','1','0');
                    end");
        

        // Simple one-line trigger (does not require BEGIN/END)
        //$sql = "CREATE TRIGGER before_user_update 
        //        BEFORE UPDATE ON users 
        //        FOR EACH ROW 
        //        SET NEW.updated_at = NOW()";
      
        $stmt = $conn->query("SHOW TRIGGERS LIKE ".getenv('DB_DATABASE').".users");
        $sessions = $stmt->fetchAll();
        if($sessions == [])
        {
            echo 'Trigger uafter_ins_trig successfully created'.PHP_EOL; 
        }
        if(sizeof($sessions)!=0)
        {
            echo 'Trigger uafter_ins_trig already up'.PHP_EOL; 
        }    
        die();
    }

    private $logger;
}

