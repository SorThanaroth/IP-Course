<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Imagick;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');
        $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

        // Save original image
        $path = $image->storeAs('uploads', $fileName);

        // Generate thumbnail using Intervention
        $thumbnailPath = 'thumbnails/' . $fileName;
        $intervention = Image::make($image->getRealPath());
        $intervention->fit(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save(storage_path('app/' . $thumbnailPath));

        // // (Optional) Also use Imagick
        // $imagick = new Imagick(storage_path('app/uploads/' . $fileName));
        // $imagick->resizeImage(200, 200, Imagick::FILTER_TRIANGLE, 1);
        // $imagick->writeImage(storage_path('app/thumbnails/' . $fileName));

        return redirect()->route('gallery.index')->with('success', 'Image uploaded and thumbnail created!');
    }
}
