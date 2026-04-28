<?php

namespace Facades;


class Route
{
     public static function is($routename)
     {
      
        $requestUri = $_SERVER['REQUEST_URI'];
        // Remove query string if present
        $path = strtok($requestUri, '?');
      //   if(self::hasTextAfterSlashSubstr($path))
      //   {               
      //       return $path == '/'.$routename;
      //   } 
        $path = strtok($requestUri, '/');

        return $path == $routename;
     }


      // A more robust approach using strpos and substr for clarity:
      private static function hasTextAfterSlashSubstr($string) {
         $slash_pos = strpos($string, '/');
         if ($slash_pos !== false) {
            $text_after = substr($string, $slash_pos + 1);
            return !empty($text_after);
         }
         return false;
      }


      public static function routename()
      {
          $requestUri = $_SERVER['REQUEST_URI'];
        // Remove query string if present
         $path = strtok($requestUri, '?');
         $path = strtok($requestUri, '/');
         return $path;
      }

}

?>