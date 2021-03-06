<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bookmark;

class BookmarksController extends Controller
{
    public function index(){
        $bookmarks = Bookmark::where('user_id', auth()->user()->id)->get();
        
        return view('home', compact('bookmarks'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'url' => 'required',
            'description' => 'required',
        ]);

        $bookmark = new Bookmark;
        $bookmark->name = $request->input('name');
        $bookmark->url = $request->input('url');
        $bookmark->description = $request->input('description');
        $bookmark->user_id = auth()->user()->id;

        $bookmark->save();

        return redirect('/home')->with('success', 'Bookmark Added');
    }

    public function destroy($id){
        $bookmark=Bookmark::find($id);
        $bookmark->delete();

        return;
    }
}
