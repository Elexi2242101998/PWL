<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;

class TestController extends Controller
{
    public function index()
    {
        $name = "Cak Imin";
        return view('test', [
            'namaCawapres1' => $name
        ]);
    }

    public function read($judul)
    {
        $headers = explode('-', $judul);
        $header = ucwords(implode(' ', $headers));
        echo $judul;
    }

    public function teacher()
    {
        //dd(Teacher::all());
        $teachers = Teacher::with('students')->get();
        return view('teacher', [
            'teachers' => $teachers
        ]);
    }

    public function student()
    {
        $students = Student::query()
            ->with('teacher')
            ->get();
        return view('student', [
            'students' => $students
        ]);
    }
}
