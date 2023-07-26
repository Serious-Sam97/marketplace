<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SendPhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        if (! $request->hasFile('image')) {
            throw new \Exception;
        }

        $image = $request->file('image');
        $img = Image::make($image->getRealPath());
        $img->resize(120, 120, function ($constraint) {
            $constraint->aspectRatio();
        });

        $user = auth()->user();
        $photoPath = '/images/users/' . $user->id . '.' . $image->getClientOriginalExtension();

        $user->photo_url = $photoPath;
        $user->save();

        Storage::disk('local')->put($photoPath, $img->stream(), 'public');
    }
}
