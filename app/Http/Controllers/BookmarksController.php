<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarksController extends Controller
{
    public function index(){
        return view('home');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
        ]);
    }
}
