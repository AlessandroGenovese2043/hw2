<?php

namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class RegisterController extends BaseController
{
    public function register_form(){
       
        if(Session::get('user_id')){
            return redirect('home');
        } 
        return view('register');
        
    }

    public function do_register(){
      
       if(Session::get('user_id')){
        return redirect('home');
       }


       $request = request();
       if($this->count_errors($request) === 0) {
            $password = password_hash($request['password'], PASSWORD_BCRYPT);
            
            $user = new User;
            $user->username =  $request['username'];
            $user->password = $password;
            $user->email = $request['email'];
            $user->nome = $request['nome'];
            $user->cognome = $request['cognome'];
            $user->save();
           
            if ($user) {
                return redirect('login');
            } 
            else {
                return redirect('register')->withInput();
            }
        }
        else{
            return redirect('register')->withInput();
        }
    }

    private function count_errors($data){

        $array_err = array();
        if (strlen($data['username'] )!= 0 && strlen($data["password"]) != 0 && strlen($data["email"]) != 0 && strlen($data["nome"]) != 0 && 
        strlen($data["cognome"]) != 0 && strlen($data["conferma_password"]) != 0){

            


            //email
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                
                $array_err[] = "Errore: Email non valida, modificarla"; 
               
                return 1;
                
            } 
            else {
                $strlow = strtolower($data['email']);
                $email = User::where('email', $strlow)->first();
                if ($email !== null) {
                    $array_err[] = "Email già utilizzata";
                }
                
            }

            //username
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username']) ) {
                $array_err[] = "Errore: Username non valido";
                return 1;;

            } 
            else { 
                $username = User::where('username', $data['username'])->first();
                if ($username !== null) {
                    $array_err[] = "Username già utilizzato";
                }
            }


            //password
            if (strlen($data["password"]) < 5) {
                $array_err[] = "<h1>Errore: Password troppo corta, modoficare password</h1>";
                return 1;
            } 

            //conferma password
            if(strcmp($data["password"], $data["conferma_password"]) != 0){
                $array_err[] = "<h1>Errore: Le due password non coincidono</h1>";
                return 1;
            }

            return (count($array_err));
        }
        else if (strlen($data['username'] )== 0 || strlen($data["password"]) == 0 || strlen($data["email"]) == 0 || strlen($data["nome"]) == 0 || 
                    strlen($data["cognome"]) == 0 || strlen($data["conferma_password"]) == 0) {

           $array_err[] = "<h1>Errore, riempi tutti i campi</h1>";
           return 1;

        }
        
    }

    public function checkUsername($username) {
    
        $exist = User::where('username', $username)->exists();
        return ['exist' => $exist];
    }

    public function checkEmail($email) {
        
        $exist = User::where('email', $email)->exists();
        return ['exist' => $exist];
    }

}
?>
