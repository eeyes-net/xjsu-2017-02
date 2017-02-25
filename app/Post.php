<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function metas()
    {
        return $this->hasMany(PostMeta::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * 获取元数据的值
     *
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public function getMeta($name, $default = null)
    {
        if (is_array($name)) {
            $ret = [];
            foreach ($name as $item) {
                $ret[$item] = $this->getMeta($item, $default[$item] ?: null);
            }
            return $ret;
        }
        $post_meta = $this->metas->where('name', $name)->first();
        if (!$post_meta) {
            return $default;
        }
        return unserialize($post_meta->value);
    }

    /**
     * 设定元数据的值
     *
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    public function setMeta($name, $value)
    {
        $post_meta = $this->metas->where('name', $name)->first();
        if (!$post_meta) {
            $post_meta = new PostMeta();
            $post_meta->name = $name;
            $post_meta->post_id = $this->id;
        }
        $post_meta->value = serialize($value);
        $post_meta->save();
        return $post_meta;
    }
}
