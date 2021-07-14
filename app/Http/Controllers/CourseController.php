<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();
        return view('pages.course.index', [
            'courses' => $courses,
        ]);
    }

    public function create(Request $request)
    {
        return view('pages.course.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required'],
            'thumbnail' => ['image']
        ]);

        $course = new Course();
        $course->id = Uuid::uuid4()->toString();
        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->description = $request->description;
        $course->user_id = Auth::user()->id;

        if ($request->file('thumbnail')) {
            $course->thumbnail = $request->file('thumbnail')->store('course-thumbnail', 'public');
        }

        $course->save();

        return redirect()->route('course.index');
    }

    public function edit(Request $request, Course $course)
    {
        return view('pages.course.edit', [
            'course' => $course,
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required'],
            'thumbnail' => ['image']
        ]);

        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->description = $request->description;

        if ($request->file('thumbnail')) {
            $course->thumbnail = $request->file('thumbnail')->store('course-thumbnail', 'public');
        }

        $course->save();

        return redirect()->route('course.index');
    }

    public function delete(Request $request, Course $course)
    {
        $course->delete();

        return redirect()->route('course.index');
    }

    public function show(Request $request, Course $course)
    {
        return view('pages.course.show', [
            'course' => $course
        ]);
    }
}
