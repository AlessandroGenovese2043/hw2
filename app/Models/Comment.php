<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public $primarykey = 'idcomment';

    public function posts(){
        return $this->belongsTo("App\Models\Post", "post", "idpost");
    }


    public function users(){
        return $this->belongsTo("App\Models\User", "user");
    }

}

?>