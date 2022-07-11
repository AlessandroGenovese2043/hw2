<?php 

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Pref;
use App\Models\Post;

class RicercaController extends BaseController
{
    public function ricerca(){
        if(!Session::get('user_id')){
            return redirect('login');
        } 
        $user = User::find(Session::get('user_id'));
        return view('ricerca')->with('user', $user);
    }

    public function dosearch($content){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $posts = Post::where('ricerca', $content)->orderBy('idpost','DESC')->get();
        if($posts->count() > 0){
            foreach($posts as $post){
                $user = User::where('id', $post['user'])->first();
                $array_post[] = array('iduser' => $post['user'], 'idpost' => $post['post'],
                                    'username' => $user['username'],'nome' => $user['nome'], 'cognome' => $user['cognome'],
                                    'number_posts' => $user['number_posts'], 'utente_loggato' => Session::get('user_id'),'descrizione' => $post['descrizione'],
                                    'tips' => $post['tips'],'image' => $post['image'],'ricerca' =>$post['ricerca'], 'correct' => true);

            }
        }
        else{
            /*Non ci sono posts per il content da mostrare*/
            $array_post[]= array('correct' => false);
        }
    
        return $array_post;
    }
    }


?>