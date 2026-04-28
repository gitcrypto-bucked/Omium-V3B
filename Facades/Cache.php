<?php

namespace Facades;

include_once "./vendor/autoload.php";

use \Facades\DB;
use \Facades\Config;

class Cache
{
    protected static function connect()
    {
        Config::env();
        $redis = new \Redis();
        $redis->connect(getenv("CACHE_URL"), getenv("CACHE_PORT"));
        return $redis;
    }


    protected static function put($key, $data, int $expires = 10)
    {
        if(gettype($data)=='array')
        {
            self::connect()->setex($key, $expires * 60, serialize($data));
        }   
        if(gettype($data)=='string')
        {
            self::connect()->setex($key, $expires * 60,$data);
        }     
        
    }

    public static function forever($key, $data)
    {
        if(gettype($data)=='array')
        {
            self::connect()->set($key, serialize($data));
        } 
        if(gettype($data)=='string')
        {
             self::connect()->set($key, $data);
        }       
        
    }

    public static function get($key)
    {
        $cache =  self::connect()->get($key);
        if(str_contains($cache,'a:') && is_string($cache))
        {
            return unserialize($cache);
        }  
        
        return $cache;
    }

    public static function has($key):bool
    {
        return self::connect()->exists($key)? true : false;
    }


    public static function search($query)
    {
        return self::connect()->keys($query);
    }

    public static function remember($key, $data, int $expires = 10)
    {
        $created_at = date('Y-m-d H:i:s');
        $expires_at = date('Y-m-d H:i:s', strtotime('+'.$expires.' minutes'));

        if(self::has($key)!=false)
        {
            $cache =  DB::getInstance()->table('cache_nosql')->where('chave','LIKE',"%".$key)->get();
            var_dump($cache); exit();
        }   
        DB::getInstance()->table('cache_nosql')->onDuplicateKey(['chave'=>$key, 'minutes'=>$expires,'created_at'=>$created_at, 'expires'=>$expires_at]);
        self::put($key, $data,  $expires) ;
    }


}