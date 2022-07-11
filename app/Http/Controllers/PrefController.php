<?php 

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Pref;
use App\Models\Post;

class PrefController extends BaseController
{
    public function preferiti(){
        if(!Session::get('user_id')){
            return redirect('login');
        } 
        $user = User::find(Session::get('user_id'));
        return view('preferiti')->with('user', $user);
    }

    public function recupera_postPref(){
        if(!Session::get('user_id')){
            return redirect('login');
        }

        $prefs = Pref::where('user', Session::get('user_id'))->orderBy('post', 'DESC')->get();
        if($prefs->count() > 0){
            foreach($prefs as $pref){
                $result = $pref->post;
                
                $post_user = Post::where('idpost',$result)->first();
                $resultpost = User::where('id', $post_user['user'])->first();
                $array_post[] = array('idprefs'=> $pref['idpref'],'iduser' => $pref['user'], 'idpost' => $pref['post'],
                                    'username' => $resultpost['username'],'nome' => $resultpost['nome'], 'cognome' => $resultpost['cognome'],
                                    'number_posts' => $resultpost['number_posts'], 'utente_loggato' => Session::get('user_id'),'descrizione' => $post_user['descrizione'],
                                    'tips' => $post_user['tips'],'image' => $post_user['image'], 'ricerca' =>$post_user['ricerca'], 'correct' => true);

            }
        }
        else{
            /*Non ci sono prefs da mostrare*/
            $array_post[]= array('correct' => false);
        }
    
        return $array_post;
    }


}
?>