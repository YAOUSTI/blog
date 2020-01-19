<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Illuminate\Support\Facades\Hash;

class CourseController extends Controller
{

    public function getCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        return response()->json(['course : '.$id => $course]);
    }

    public function indexCourses()
    {
        $courses = Course::all();
        return response()->json(['results' => $courses, 'total' => count($courses)]);
    }

    public function store(Request $request)
    {

        $attributes = $request->validate([
            'category_id' => 'required|max:20',
            'name' => 'required|max:150',
            'description' => 'required',
            'slug' => 'required|max:255',
            
        ]);

        $course  = Course::create($attributes);

        return response()->json(['course' => $course]);
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $attributes = [];

        if (isset($request->name)) {
            $attributes['name'] = $request->name;
        }
        if (isset($request->description)) {
            $attributes['description'] = $request->description;
        }
        if (isset($request->slug)) {
            $attributes['slug'] = $request->slug;
        }
        if (isset($request->category_id)) {
            $attributes['category_id'] = $request->category_id;
        }

        $course->update($attributes);
        return response()->json(['course' => $course]);
    }

    public function delete(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->delete($id);
        return response()->json(['message' => 'Course deleted successfully']);
    }
}
