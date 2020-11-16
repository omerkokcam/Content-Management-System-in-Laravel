<?php

namespace App\Http\Controllers\Cms;

use App\Models\Albums;
use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class albumsController extends Controller
{
    //ALBUMS

    //for listing
    public function index(){
        $albums = Albums::all();
        View::share('albums',$albums);
        return view('CMS.albums.list');
    }

    //for create page
    public function create(){
        return view('CMS.albums.create');
    }

    //for creating an album
    public function create_album(Request $request){
        // create new album with oop
        $albums = new Albums();
        $albums->title = $request->title;
        $file=$request->file('image');
        // put the file to path
        $file->move(public_path() . '/images/albums/'.$albums->title.'', $file->getClientOriginalName());
        $albums->img_url=$file->getClientOriginalName();
        $albums->save();

        return redirect()->route('CMS.albums.create');
    }

    //for upload page

    public function edit($id){
        //find the album with id
        $album = Albums::find($id);
        return view('CMS.albums.edit')->with('album',$album);
    }

    // for uploading an album
    public function edit_album($id,Request $request){
        //find the album with id
        $album = Albums::find($id);
        //find the path to the previous file
        $previousFilePath = public_path() . '/images/albums/' .$album->title. '/' . $album->img_url;
        // and delete them
        unlink($previousFilePath);
        // take properties new album
        $album->title = $request->title;
        $file=$request->file('image');
        // put the file to path
        $file->move(public_path() . '/images/albums/'.$album->title.'', $file->getClientOriginalName());
        $album->img_url=$file->getClientOriginalName();
        // save properties
        $album->save();
        return redirect()->route('CMS.albums.list');
    }

    public function delete_album($id){
        //find the album with id
        $album = Albums::find($id);
        // and delete them (but it's not deleting. it's a soft delete)
        $album->delete();
        //now delete them in locale
        //find the path to the image file
        $imagePath = public_path() . '/images/albums/' .$album->title. '/' . $album->img_url;
        //and delete them
        unlink($imagePath);
        //find the directory name
        $filePath = public_path() . '/images/albums/' .$album->title;
        // and delete them
        if (\File::exists($filePath)) \File::deleteDirectory($filePath);

        return redirect()->route('CMS.albums.list');
    }


    //PHOTOS

    public function create_photo_screen(){
        // for select the album
        $albums = Albums::all();
        return view('CMS.albums.createphoto')->with('albums',$albums);

    }

    public function create_photo(Request $request){

        // create a photo with oop
        $photo = new Photos();
        //take properties
        $photo->album_id = $request->album_id;
        //take album datas
        $album = Albums::find($request->album_id);
        $file=$request->file('image');
        // put the file to path
        $file->move(public_path() . '/images/albums/'.$album->title.'', $file->getClientOriginalName());
        $photo->img_url=$file->getClientOriginalName();
        $photo->save();
        return redirect()->route('CMS.albums.list');
    }

    public function edit_photo_screen($id){
        //find the photo with id
        $photo = Photos::find($id);
        $albums = Albums::find($photo->album_id);
        return view('CMS.albums.editphoto')->with(['photo'=>$photo,'albums'=>$albums]);
    }

    public function edit_photo($id,Request $request){
        //find the photo with id
        $photo = Photos::find($id);
        $album_id = $photo->album_id;
        $album = Albums::find($album_id);
        //find the path to the previous file
        $previousFilePath = public_path() . '/images/albums/' .$album->title. '/' . $photo->img_url;
        // and delete them
        unlink($previousFilePath);

        // update properties
        $photo->album_id = $request->album_id;
        $album = Albums::find($request->album_id);
        $file=$request->file('image');
        // put the file to path
        $file->move(public_path() . '/images/albums/'.$album->title.'', $file->getClientOriginalName());
        $photo->img_url=$file->getClientOriginalName();
        $photo->save();

        return redirect()->route('CMS.albums.list');
    }

    public function delete_photo($id){
        //find the photo with id
        $photo = Photos::find($id);
        //find the album with photo album_id
        $album = Albums::find($photo->album_id);
        // and delete them (but it's not deleting. it's a soft delete)
        $photo->delete();
        //now delete them in locale
        //find the path to the image file
        $imagePath = public_path() . '/images/albums/' .$album->title. '/' . $photo->img_url;
        //and delete them
        unlink($imagePath);

        return redirect()->route('CMS.albums.list');
    }



}
