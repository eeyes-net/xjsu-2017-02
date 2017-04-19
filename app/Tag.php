<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    /**
     * 找到指定名称的标签
     *
     * @param string $name
     *
     * @return mixed
     */
    public static function findName($name)
    {
        return self::where('name', $name)->first();
    }
}
