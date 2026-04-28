<?php


namespace Facades;



class Storage
{
    public static function storeAs( $file, $path, $filename)
    {
        if(!is_dir(getcwd().'/storage'.'/public'.'/'.$path))
        {
            mkdir(getcwd().'/storage'.'/public'.'/'.$path, 0777, true);
        }
        $target_file = getcwd().'/storage'.'/public'.'/'.$path.'/'.$filename;
        return move_uploaded_file($file, $target_file);
    }

    public static function read($path, $file)
    {
        $spath = getcwd().DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.$path.DIRECTORY_SEPARATOR;
        return @($spath.$file);
    }

    public static function urlRead($path, $file)
    {
        $spath =  self::base_url(true, false, false).'storage/public/'.$path.'/'.$file;
        return $spath;
    }

    private static function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
            
            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), -1, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];
            
            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';
        
        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }
        
        return $base_url;
    }
}