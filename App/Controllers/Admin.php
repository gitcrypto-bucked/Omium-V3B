<?php 

namespace App\Controllers;
use Core\Auth;
use \Facades\Redirect;
use \Facades\DB;

class Admin 
{
    public function indexAction($request)
    {
        Auth::admin();
     
        $users = \App\Models\User::all();
        \Core\View::renderTemplate('admin', ['users'=>$users],null);
    }

    public function usersAction($request)
    {
        Auth::admin();
        $fn = $request['fn'];
        $id = base64_decode($request['id']);
        
        switch($fn)
        {
            case 'edit':
                    $user = \App\Models\User::find($id);
                    $perm = Auth::permissionKeys();
                    $user_permission = \App\Models\User::permission($id)[0];
                    \Core\View::renderTemplate('user.edit', ['user'=>$user[0], 'perm'=>$perm,'user_perm' =>$user_permission],null);
                break;
            case 'delete':
                    if(!isset($_GET['status']))
                    {
                         \Core\View::renderTemplate('templates/prompt', ['yes'=>\Facades\Redirect::url('/users/delete/'.$request['id'].'?status=yes'),
                                                                    'no'=>\Facades\Redirect::url('admin'),
                                                                    'text'=>'Esta ação não pode ser desfeita. Por favor, confirme para prosseguir.'
                                                                ],null);
                    }
                    if(isset($_GET['status']) && $_GET['status']=='yes')
                    {
                        if(\App\Models\User::delete($id))
                        {
                            Redirect::with('success', 'Usuário excluido com sucesso');
                            return Redirect::to('/admin');
                        }
                        else
                        {
                            Redirect::with('error','Erro ao excluir o  usuário');
                            return Redirect::to('/admin');
                        }
                    }
          
                    break;
            default:
                return Redirect::back();
        }
    }

    public function updateUsersAction($request)
    {
        $validation = [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'ativo' => 'required'
        ];

        if(Auth::validade($request, $validation))
        {
            $id = $request['id'];
            $ativo =  str_contains($request['ativo'],'ativo')? '1' : '0';


            $dash = str_contains(@$request['dash'],'on') ? '1':'0';
            $blog = str_contains(@$request['blog'],'on') ? '1':'0';
            $admin = str_contains(@$request['admin'],'on') ? '1':'0';
         

            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'admin' => $admin,
                'active' => $ativo
            ];


            $perm = [
                        'dash'=>$dash,
                        'blog'=>$blog,
                        'admin'=>$admin
                    ];
       
            if(\App\Models\User::update($id, $data) &&  \App\Models\User::updatePermission($id,$perm))
            {
                Redirect::with('success', 'Usuário atualizado com sucesso');
                return Redirect::back();
            }
            else
            {
                Redirect::with('error','Erro ao atualizar o  usuário');
                return Redirect::back();
            }
        }
        else
        {
            Redirect::with('error','Erro ao atualizar o  usuário');
            Redirect::back();   
        }
    }

    public function addAction()
    {
        $perm = Auth::permissionKeys();
        \Core\View::renderTemplate('user.add', ['perm'=>$perm   ],null);

    }

    public function addUser($request)
    {
        $name = $request['name'];
        $email = $request['email'];

        $dash = str_contains(@$request['dash'],'on') ? '1':'0';
        $blog = str_contains(@$request['blog'],'on') ? '1':'0';
        $admin = str_contains(@$request['admin'],'on') ? '1':'0';

         $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'admin' => $admin,
                'active' => '1'
            ];

        $perm = [
                        'dash'=>$dash,
                        'blog'=>$blog,
                        'admin'=>$admin
                    ];
       \App\Models\User::save( $data);
        $id =  DB::getInstance()->select(['id'])->table('users')->where('name','LIKE',$name)->get()[0]['id'];
       
        if($id !=0)
        {
             \App\Models\User::updatePermission($id,$perm);
            Redirect::with('success', 'Usuário criado com sucesso');
            return Redirect::back();
        }
        else
        {
            Redirect::with('error','Erro ao criar o  usuário');
            return Redirect::back();
        }
    }
}

?>