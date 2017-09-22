<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // public function _construct()
    // {
    //     $this->table = 'posts';
    //     $this->pk = 'id';
    // }

    protected $fillable = ['subject','description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
