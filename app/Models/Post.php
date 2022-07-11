<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    public $primarykey = 'idpost';

    public function likes(){
        return $this->hasMany("App\Models\Like", 'post');
    }

    public function comments(){
        return $this->hasMany("App\Models\Comment", 'post');
    }

    public function prefs(){
        return $this->hasMany("App\Models\Pref", 'post');
    }

    public function users(){
        return $this->belongsTo("App\Models\User", "user");
    }

}

?>