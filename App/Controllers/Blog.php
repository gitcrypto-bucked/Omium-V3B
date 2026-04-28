<?php 

namespace App\Controllers;

use Core\Auth;
use \Facades\Redirect;
use \Facades\Storage;
use App\Models\Blog as BlogModel;
use \Facades\Cache;

class Blog 
{
    public function indexAction()
    {
        $blog = BlogModel::allPaginated(8, @$request['page']);
        
        \Core\View::renderTemplate('blog',['blog'=>$blog],null);
    }

    public function addAction()
    {
        \Core\View::renderTemplate('blog.add',[],null);
    }

    public function newTopic($request)
    {
          $validation = [
            'title' => 'required:10',
            'paragraph' => 'required:20'
        ];

        if(Auth::validade($request, $validation))
        {
            $imageFileType = null;
            $check = getimagesize($_FILES["imagem"]["tmp_name"]);
            if($check)
            {
                switch($_FILES['imagem']["type"])
                {
                    case "image/jpeg":
                        $imageFileType = '.jpeg';
                    break;
                    case "image/png":
                        $imageFileType = '.png';
                    break;
                    case "image/webp":
                        $imageFileType = '.webp';
                    break;
                    default:
                        Redirect::with('error','Por favor selecione um arquivo válido');
                        Redirect::to('blog/add');
                }
                if ($_FILES["imagem"]["size"] > 500000)
                {
                    Redirect::with('error','Por favor selecione um arquivo menor que 1MB');
                    Redirect::to('blog/add');
                }
                $filename = md5(time()).$imageFileType;
                if(Storage::storeAs($_FILES["imagem"]["tmp_name"],'blog',$filename))
                {
                    $data = [
                        'titulo' => $request['title'],
                        'subtitulo' => $request['paragraph'],
                        'thumb' => $filename,
                        'data_criacao'=>date('Y-m-d H:i:s'),
                        'active'=>'1'
                    ];
                    if(BlogModel::save($data))
                    {
                        Redirect::with('success','Tópico criado com sucesso');
                        Redirect::to('blog/add');
                    }
                    else
                    {
                        Redirect::with('error','Erro ao criar tópico');
                        Redirect::to('blog/add');
                    }
                        
                }
                
            }
        }     
        else
        {
            Redirect::with('error','Usuário ou senha inválidos');
            Redirect::to('blog/add');
        }       
    }
}

?>