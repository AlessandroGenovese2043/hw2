<?php
/*per ogni tabella definire una classe saranno tutte con has many*/
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;

    public function posts(){
        return $this->hasMany("App\Models\Post",'user');
    }

    public function comments(){
        return $this->hasMany("App\Models\Comment",'user');
    }

    public function likes(){
        return $this->hasMany("App\Models\Like",'user');
    }

    public function prefs(){
        return $this->hasMany("App\Models\Pref", 'user');
    }



}


?>
