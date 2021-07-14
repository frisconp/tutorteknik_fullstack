<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();

        return response()->json([
            'status' => true,
            'message' => 'get_all_course',
            'data' => $courses
        ]);
    }
}
