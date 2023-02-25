<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Game;

use App\Req;

use App\rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class UpController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(User $user, Request $request)
    {
        dd($request->name);
    }
}
