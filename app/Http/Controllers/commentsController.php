<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comments;
use Illuminate\Support\Facades\Auth;

class commentsController extends Controller
{
    public function add(Request $req)
    {
        if (Auth::user()) {
            comments::create([
                'perlki_id' => $req['id'],
                'user_id' => Auth::id(),
                'content' => $req['content']
            ]);
            return back();
        } else
            return redirect(route('login'));
    }
}
