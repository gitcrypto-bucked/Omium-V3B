<?php


namespace App\Controllers;
use App\Models\User as UserModel;
use Core\Auth;
use \Facades\Redirect;
use \Facades\Storage;
use \Facades\Cache;


class Dash extends \Core\Controller
{
    public function indexAction()
    {
       $this->beforeExecute();

        if(Cache::has('graph1'))
        {
            $graph1 = Cache::get('graph1');
        }    
        else
        {
               $users = UserModel::graph();
               $graph1 = [
                    'users' => array_column($users,'total'),
                    'date' => array_column($users,'date')
               ];
               Cache::remember('graph1',$graph1,10);
        }    
      

       \Core\View::renderTemplate('dash',['graph1'=>$graph1], null);
    }

    protected function beforeExecute(): void
	{
        if(!\Core\Auth::logged())
        {
             header('Location: '.url('login'));
        }
	}

	protected function afterExecute(): void
	{
		
	}
}
