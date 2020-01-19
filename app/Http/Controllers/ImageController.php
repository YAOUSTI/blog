<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Image;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ImageController extends Controller
{
    public function UploadImageCourse(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:' . implode(",", Config::get('imageable.mimes')) . '|max:' . Config::get('imageable.max_file_size')
        ]);
        $image_name = 'image-' . time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $image_name);

        if (isset($request->id)) {
            $image = new Image();
            $image->file_name = $image_name;
            $course = Course::findOrFail($request->id);
            $course->image()->save($image);
        }

        return response()->json(['message' => 'Image uploaded successfully']);
    }
    

    public function UploadImageCategory(Request $request)
    {
        request()->validate([
            'image' => 'required|image|mimes:' . implode(",", Config::get('imageable.mimes')) . '|max:' . Config::get('imageable.max_file_size')
        ]);
        $image_name = 'image-' . time() . '.' . request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $image_name);

        if (isset($request->id)) {
            $image = new Image();
            $image->file_name = $image_name;
            $categorie = Category::findOrFail($request->id);
            $categorie->image()->save($image);
        }

        return response()->json(['message' => 'Image uploaded successfully']);
    }
}
