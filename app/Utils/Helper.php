<?php

if (!function_exists('limit_words'))
{
    function limit_words($string, $words = 100, $end = '...')
    {
        return \Illuminate\Support\Str::words($string, $words, $end);
    }
}