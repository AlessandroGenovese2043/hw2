<?php 

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Pref;

class HomeController extends BaseController
{
    public function home(){
        if(!Session::get('user_id')){
            return redirect('login');
        } 
        $user = User::find(Session::get('user_id'));
        return view('home')->with('user', $user);
    }

    public function recupera_posts(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        
        $posts = Post::orderBy('idpost', 'DESC')->get();
        $array_post = array();
        if($posts->count() > 0){
            
            foreach($posts as $post){
               
                $result = $post->users;
                $array_post[] = array('idpost'=> $post['idpost'],'iduser' => Session::get('user_id'), 'number_likes' => $post['number_likes'],
                                    'number_comments' => $post['number_comments'], 'image' => $post['image'], 
                                    'descrizione' => $post['descrizione'], 'tips' => $post['tips'], 'ricerca' =>$post['ricerca'],'username' => $result['username'], 
                                    'nome' => $result['nome'], 'cognome' => $result['cognome'], 'number_posts' => $result['number_posts'], 
                                    'image_profile' => $result['image_profile']);
            }
            return $array_post;
        }
        else{
            /*Non ci sono post da mostrare*/
            $array_post[]= array('correct' => false);
        }
        
        return $array_post;
    }

    public function inseriscri_like(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $idpost = request('idpost');
        $like = new Like;
        $like->user = Session::get('user_id');
        $like->post = $idpost;
        $like->save();
        if($like){
            $result = Post::where('idpost', $idpost)->first();
            if($result->count() != 0){
                $array = array('number_likes' => $result['number_likes'], 'idpost' => $idpost, 'error' => false);
            }
            else{
                $array = array('error' => true);
                return $array;
            }
        }
        else{
            $array = array('error' => true);
            return $array;
        }

        return $array;

  
    }

    public function recupera_like(){
        if(!Session::get('user_id')){
            return redirect('login');
        }


        $likes = Like::All();
        $array_post = array();
        if($likes->count() != 0){
            foreach($likes as $like){
                $result = $like->users;
                $array_post[] = array('idlikes'=> $like['idlikes'],'iduser' => $like['user'], 'idpost' => $like['post'],
                            'username' => $result['username'],'nome' => $result['nome'], 'cognome' => $result['cognome'],
                             'number_posts' => $result['number_posts'], 'utente_loggato' => Session::get('user_id'));
            }
        }
        else{
            /*Non ci sono likes da mostrare*/
            $array_post[]= array('correct' => false);
        }
        return $array_post;    

        


    }

    public function elimina_like(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $idpost = request('idpost');
        Like::where('user', Session::get('user_id'))->where('post', $idpost)->delete(); 
        
        $result = Post::where('idpost', $idpost)->first();
        if($result->count() > 0){
            $array = array('number_likes' => $result['number_likes'], 'idpost' => $idpost, 'error' => false);
        }
        else{
            $array = array('error' => true);
            exit;
        }
        return $array;
   

    }

    public function recupera_commenti($idpost){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        $comments = Comment::where('post', $idpost)->orderBy('idcomment')->get();

        
        $array_post = array();
        if($comments->count() > 0){
            
            foreach($comments as $comment){
                $result = $comment->users;
                $array_post[] = array('idcomment'=> $comment['idcomment'],'iduser' => $comment['user'], 'idpost' => $comment['post'],
                            'testo' => $comment['testo'], 'username' => $result['username'], 'nome' => $result['nome'], 'cognome' => $result['cognome'],
                             'number_posts' => $result['number_posts'], 'utente_loggato' => Session::get('user_id'), 'correct' => true);
            }
        }
        else{
            /*Non ci sono commenti da mostrare*/
            $array_post[]= array('correct' => false);
        }
        return $array_post;


    }

    public function inserisci_commmento(){
        if(!Session::get('user_id')){
            return redirect('login');
        }

        $idpost = request('idpost');
        $content = request('content');

        $comment = new Comment;
        $comment->user = Session::get('user_id');
        $comment->post = $idpost;
        $comment->testo = $content;
        $comment->save();

        if($comment){
            $result = Post::where('idpost', $idpost)->first();
            if($result->count() > 0){
                $array = array('number_comments' => $result['number_comments'], 'idpost' => $idpost, 'error' => false,
                        'username' => Session::get('username'), 'testo' => $content,  'nome' => Session::get('nome'), 'cognome' => Session::get('cognome'));
            }
            else{
                $array = array('error' => true);
                return $array;
            }
        }
        else{
            $array = array('error' => true);
            return $array;
        }

        return $array;
    }

    public function recupera_preferiti(){
        if(!Session::get('user_id')){
            return redirect('login');
        }

        $prefs = Pref::All();
        $array_post = array();
        if($prefs->count() != 0){
            foreach($prefs as $pref){
                $result = $pref->users;
                $array_post[] = array('idprefs'=> $pref['idpref'],'iduser' => $pref['user'], 'idpost' => $pref['post'],
                            'username' => $result['username'],'nome' => $result['nome'], 'cognome' => $result['cognome'],
                             'number_posts' => $result['number_posts'], 'utente_loggato' => Session::get('user_id'), 'correct' => true);
            }
        }
        else{
            /*Non ci sono prefs da mostrare*/
            $array_post[]= array('correct' => false);
        }

        return $array_post;


    }

    public function inserisci_pref(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        
        $idpost = request('idpost');

        $prefs = new Pref;
        $prefs->user = Session::get('user_id');
        $prefs->post = $idpost;
        $prefs->save();

        if($prefs){
            $array = array('error' => false, 'idpost' => $idpost);
        }
        else{
            $array = array('error' => true);
        }

        return $array;
    
    }

    public function elimina_pref(){
        if(!Session::get('user_id')){
            return redirect('login');
        }

        $idpost = request('idpost');
        $delete = Pref::where('user', Session::get('user_id'))->where('post', $idpost)->delete();

        if($delete){
            $array = array('error' => false, 'idpost' => $idpost);

        }
       else{
            $array = array('error' => true);

       }

       return $array;

    }

}
?>