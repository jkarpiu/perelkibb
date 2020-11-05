<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\perlki;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class perelkiController extends Controller
{
    public function index()
    {
        $collection = perlki::where('active', 1)->orderBy('score', 'desc')->get();
        return view('index', ['collection' => $collection]);
    }

    public function add(Request $request)
    {
        if (Auth::user()) {
            $request->validate([
                'name' => 'required',
                'location' => 'required',
                'desc' => 'required',
                'image' => 'required|image|max:2048',
            ]);
            $img_name = Str::random(30);
            $extension = $request->image->extension();
            $request->image->storeAs('/public', $img_name . "." . $extension);
            perlki::create([
                'name' => $request['name'],
                'street' => $request['location'],
                'image' =>  Storage::url($img_name . "." . $extension),
                'desc' => $request['desc'],
                'active' => true,
                'user_id' => Auth::id(),
                'score' => 1,
            ]);
            return redirect(route('/'));
        } else
            return redirect(route('login'));
    }

    public function item($id)
    {
        $item = perlki::where('id', $id)->get()->first();
        return view('item', ['item' => $item]);
    }

    public function addPoint(Request $req)
    {
        perlki::where('id', $req['id'])->increment('score', 1);
        return back();
    }

    public function removePoint(Request $req)
    {
        perlki::where('id', $req['id'])->decrement('score', 1);
        return back();
    }

    public function search(Request $req)
    {
        $req -> flash();
        $data = perlki::where('name', 'LIKE', '%' . $req['query'] . '%')->orderBy('score', 'desc')->get();
        return view('index', ['collection' => $data]);
    }
}
