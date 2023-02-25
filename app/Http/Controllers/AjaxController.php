<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReplyData;

use App\Post;

use App\Game;

use App\Req;

use App\Rep;

use App\user;

use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ReplyData $request)
    {
        $rep = new Rep();
        $rep->reply = $request->reply;
        $rep->user_id = Auth::user()->id;
        $rep->post_id = $request->post;

        $rep->save();

        $reply = $rep->id;


        $commentData = Rep::with('user')->find($reply);


        $json = ["commentData" => $commentData];

        return response()->json($json);
    }
}
