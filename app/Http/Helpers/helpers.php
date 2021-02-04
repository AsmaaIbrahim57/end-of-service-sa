<?php

if (! function_exists('css')) {
    function css($file){
        return '<link href="'.asset('css/'.$file.'.css').'" rel="stylesheet">';
    }   
}

if (! function_exists('js')) {
    function js($file){
        return '<script type="text/javascript" src="'.asset('js/'.$file.'.js').'"></script>';
    }   
}

if(! function_exists('icon')){
    function icon($file){
        return asset('assets/icons/'.$file);
    }
}

if(! function_exists('img')){
    function img($file){
        return asset('assets/images/'.$file);
    }
}

if(! function_exists('video')){
    function video($file){
        return asset('assets/videos/'.$file);
    }
}
