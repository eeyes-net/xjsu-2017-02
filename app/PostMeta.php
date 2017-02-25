<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
