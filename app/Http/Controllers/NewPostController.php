<?php 

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Post;

class NewPostController extends BaseController
{
    public function newPost(){
        if(!Session::get('user_id')){
            return redirect('login');
        } 
        $user = User::find(Session::get('user_id'));
        return view('newPost')->with('user', $user);
    }
    
    public function caricamento(){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        
        $request = request();
       
        $post = new Post;	
        $post->user= Session::get('user_id');
        $post->image = $request['select'];
        $post->ricerca = $request['ricerca'];
        $post->descrizione = $request['textarea'];
        if(isset($request['tips'])){
            $post->tips = $request['textarea_tips'];
        }
        $post->save();
        if ($post) {
            return ['correct' => true]; 
        } 
        else {
            return ['correct' => false];
        }
    }

    public function ricercanewPost($type, $q = ''){
        if(!Session::get('user_id')){
            return redirect('login');
        }
        if($type === 'image'){
            $this->image($q);
            return;
        }
        else{
            $this->giphy($q);
            return;
        }   


    }
    private function image($q1){
    
        $maxResults = 16;
        $img_endpoint = 'https://pixabay.com/api/' ;
        $img_key = env('IMG_KEY');
        $q = urlencode($q1);
        $url = $img_endpoint.'?key='.$img_key.'&q='.$q.'&per_page='.$maxResults;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }

    private function giphy($q1) {
    
        $maxResults = 16;
        $giphy_endpoint = 'api.giphy.com/v1/stickers/search' ;
        $giphy_key = env('GIPHY_KEY');
        $q = urlencode($q1);
        $url = $giphy_endpoint.'?q='.$q.'&api_key='.$giphy_key.'&limit='.$maxResults;
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        echo $result;
    }
    

}
?>

    






