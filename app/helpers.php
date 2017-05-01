<?php

if (!function_exists('html_to_text')) {
    function html_to_text($html)
    {
        return trim(preg_replace('/[\s\0\x0B\xC2\xA0]+/su', ' ', html_entity_decode(preg_replace('/<.*?>/su', ' ', $html))));
    }
}

if (!function_exists('escape_like')) {
    /**
     * @param $string
     *
     * @return mixed
     */
    function escape_like($string)
    {
        $search = array('%', '_');
        $replace = array('\%', '\_');
        return str_replace($search, $replace, $string);
    }
}
