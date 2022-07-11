<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function login_form(){
        if(Session::get('user_id')){
            return redirect('home');
        } // se l'utente ha già fatto il login lo rimandiamo a home
        $error = Session::get('error');
        Session::forget('error');
        return view('login')->with('error', $error);
        
        
    }

    public function do_login(){
       
       if(Session::get('user_id')){
        return redirect('home');
       }
       $request = request();
       if (!empty($request['username']) && !empty($request['password']) ){
        
            if(filter_var($request['username'], FILTER_VALIDATE_EMAIL)){
                $toSearch = 'email';
            } 
            else{
                $toSearch = 'username';
            } 
            $user = User::where($toSearch, $request['username'])->first();
            if($user!== null && password_verify($request['password'], $user->password)){
                Session::put('user_id', $user->id);
                Session::put('username', $user->username);
                Session::put('nome', $user->nome);
                Session::put('cognome', $user->cognome);
                
                return redirect('home');
            }
            else {
                Session::put('error', 'campi_errati');
                return redirect('login');
            }
            
           
    
        }
        else if (isset($request["username"]) || isset($request["password"])) {
            
            Session::put('error', 'campi_mancanti');
            return redirect('login');
        }
    }


}
?>