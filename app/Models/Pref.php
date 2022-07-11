<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pref extends Model
{
    public $timestamps = false;
    public $primarykey = 'idpref';

    public function users(){
        return $this->belongsTo("App\Models\User", "user");
    }

    public function posts(){
        return $this->belongsTo("App\Models\Post", "post", "idpost");
    }

}

?>