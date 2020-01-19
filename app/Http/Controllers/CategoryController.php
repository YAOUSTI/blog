<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json(['results' => $categories, 'total' => count($categories)]);
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'name' => 'required|max:5',
            'slug' => 'required|max:10',
        ]);

        $categorie  = Category::create($attributes);

        return response()->json(['categories' => $categorie]);
    }

    public function update(Request $request, $id)
    {
        try {
            $categorie = Category::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "this ID : " . $id . " is Wrong ! try another one"]);
        }

        $attributes = [];
        if (isset($request->category_id)) {
            $attributes['category_id'] = $request->category_id;
        }

        if (isset($request->name)) {
            $attributes['name'] = $request->name;
        }

        if (isset($request->description)) {
            $attributes['description'] = $request->description;
        }

        if (isset($request->slug)) {
            $attributes['slug'] = $request->slug;
        }


        $categorie->update($attributes);
        return response()->json(['course updated successfully' => $categorie]);
    }

    public function delete(Request $request, $id)
    {
        try {
            $categorie = Category::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => "this ID : " . $id . " is Wrong ! try another one"]);
        }

        $categorie = Category::findOrFail($id);
        $photo = $categorie->image()->first();
        File::delete(public_path('images/' . $photo->file_name));
        $categorie->delete($id);
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
