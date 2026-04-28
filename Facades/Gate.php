<?php 

namespace Facades;
include_once('Facades/View.php');
use \Facades\DB;
use \Core\Auth;
use \Facades\Route;
use \Facades\Redirect;

final class Gate extends \Core\Auth 
{

    public static function can()
    {
        $perm = parent::permission();

        if(boolval(@$perm[Route::routename()])!=false || self::unrollpages())
        {
            return true;
        }
         
    }


    protected static function unrollpages()
    {
        return Route::is('profile') | Route::is('login') | Route::is('logout');
    }

 

   

}
