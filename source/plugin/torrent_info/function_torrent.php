<?php

if(!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

function getFiletype($str) {
    global $filetypes;
    $filetype = 'unknown';

    $pos = strrpos($str, '.');
    if(is_array($filetypes) && $pos > 0) {
        $str = substr($str, $pos+1);
        $str = strtolower($str);
        foreach($filetypes as $key => $val) {
            if(in_array($str, $val, true)) {
                $filetype = $key;
                break;
            }
        }
    }
    return $filetype;
}
?>