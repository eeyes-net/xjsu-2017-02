<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    /**
     * 获取设置项的值
     *
     * @param string $name
     * @param mixed $default
     *
     * @return mixed
     */
    public static function getOption($name, $default = null)
    {
        if (is_array($name)) {
            $ret = [];
            foreach ($name as $item) {
                $ret[$item] = self::getOption($item, $default[$item] ?: null);
            }
            return $ret;
        }
        $option = self::where('name', $name)->first();
        if (!$option) {
            return $default;
        }
        return unserialize($option->value);
    }

    /**
     * 设定设置项的值
     *
     * @param string $name
     * @param mixed $value
     *
     * @return mixed
     */
    public static function setOption($name, $value)
    {
        $option = self::where('name', $name)->first();
        if (!$option) {
            $option = new Option();
            $option->name = $name;
        }
        $option->value = serialize($value);
        $option->save();
        return $option;
    }
}
