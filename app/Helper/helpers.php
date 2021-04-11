<?php

use Carbon\Carbon;

if(!function_exists('niceDate')){
    function niceDate($datetime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('d M Y');
    }
}

if(!function_exists('excerpt')){
    function excerpt($datetime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format('d M Y');
    }
}