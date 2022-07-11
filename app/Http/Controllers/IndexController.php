<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class IndexController extends BaseController
{
    public function index(){
        if(Session::get('user_id')){
            return redirect('home');
        } // se l'utente ha già fatto il login lo rimandiamo a home
        return view('index');
    }
}
?>