<?php

namespace App\Http\Controllers\Front;

use App\Models\Albums;
use App\Models\Photos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class albumsController extends Controller
{
    //for listing
    public function index(){
        //take all albums
        $albums = Albums::all();
        return view('Front.main')->with('albums',$albums);
    }

    //for album detail page
    public function album_detail($id){
        //find the album with id
        $album = Albums::find($id);
        $photos = Photos::where('album_id',$album->id)->get();
        return view('Front.albums.view')->with(['album'=>$album,'photos'=>$photos]);
    }



}
