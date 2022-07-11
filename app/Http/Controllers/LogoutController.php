<?php
namespace App\Http\Controllers;


use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LogoutController extends BaseController
{
    public function logout(){
        Session::flush();
        return redirect('login');
    }
}
?>