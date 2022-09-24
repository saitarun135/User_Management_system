<?php
namespace App\Http;

if(!function_exists('binaryPassword')){
    function binaryPassword($password){
        if(is_null($password)){
            return 'It should not be null';
        }
        return md5($password);
    }
}
