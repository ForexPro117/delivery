<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnController extends Controller
{
    //
    public function create()
    {
        return view('createAnn');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['mimes:jpeg,jpg,png,gif,svg', 'max:4096'],
            'description' => ['required', 'string'],
            'name' => 'required|string|max:60|min:1',
            'price' => 'nullable|integer|max:9999999'
        ]);
        $ann = new Announcement();
        $ann->announcement_name = $request->name;
        $ann->user_id = $request->user()->id;
        $ann->description = $request->description;
        $ann->price = $request->price;
        $ann->save();
        foreach ($request->images as $image) {
            $photo = new Photo();
            $photo->announcement_id = $ann->id;
            $photo->file = Storage::disk('public_uploads')->put('/', $image);
            $photo->file_original_name = $image->getClientOriginalName();
            $photo->save();
        }


        return view('banner', ['text' => 'Вы успешно создали свое объявление,']);
    }

    public function home()
    {
       /* $ann = Announcement::all();
        foreach ($ann as $an) {
            $photos = Photo::where('announcement_id', $an->id)->get();
            $an->countPhotos = count($photos);
            for ($i = 0; $i < count($photos); $i++) {
                $an['photo' . $i] = $photos[$i]->file;
            }

        }*/
        return view('home');
    }

    public function search(Request $request)
    {
        $ann = Announcement::where('announcement_name', 'like', '%' . $request->search . '%')->get();
        foreach ($ann as $an) {
            $photos = Photo::where('announcement_id', $an->id)->get();
            $an->countPhotos = count($photos);
            for ($i = 0; $i < count($photos); $i++) {
                $an['photo' . $i] = $photos[$i]->file;
            }

        }
        return view('home', ['ann' => $ann]);
    }

    public function watch(Request $request, $id)
    {
        $ann = Announcement::find($id);
        $photos = Photo::where('announcement_id', $ann->id)->get();
        $ann->countPhotos = count($photos);
        for ($i = 0; $i < count($photos); $i++) {
            $ann['photo' . $i] = $photos[$i]->file;
        }
        $user = User::find($ann->user_id);
        return view('annWatch', ['ann' => $ann, 'user' => $user]);

    }

    public function getHistory(Request $request)
    {
        $ann = Announcement::where('user_id', $request->user()->id)->get();
        foreach ($ann as $an) {
            $photos = Photo::where('announcement_id', $an->id)->get();
            $an->countPhotos = count($photos);
            for ($i = 0; $i < count($photos); $i++) {
                $an['photo' . $i] = $photos[$i]->file;
            }

        }
       return view('historyAnn', ['ann' => $ann]);
    }
    public function delete(Request $request)
    {
        $ann = Announcement::find($request->id);
        /*Storage::delete($response->file);*/
        $ann->delete();
        return 'good';
    }

}
