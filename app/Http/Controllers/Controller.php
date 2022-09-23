<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLoggedInID(){
        $request = app('request');
        $user_obj = $request->session()->get('user');
        return (isset($user_obj) && count($user_obj) > 0) ? $user_obj[0]['id'] : redirect('login');
    }
}
