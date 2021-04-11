<?php

use App\Models\Setting;
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

if(!function_exists('getOption')){
    function getOption($name)
    {
        return Setting::where('option_name', $name)->first()->option_value ?? '';
    }
}