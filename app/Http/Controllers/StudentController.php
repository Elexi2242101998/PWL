<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;

class StudentController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d'),
            'id_teacher' => 'nullable|exists:students,id',
        ]);

        $student = Student::find($request->id);
        if (!$student) {
            abort(404);
        }

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob,
            'id_teacher' => $request->id_teacher,
        ]);

        return redirect('/student');
    }

    public function edit($id)
{
    $student = Student::find($id);
    if (!$student) {
        abort(404);
    }

    $teachers = Teacher::all();
    return view('content.student.edit', [
        'student' => $student,
        'teachers' => $teachers,
    ]);
}

    public function delete(Request $request)
    {
        $student = Student::find($request->id);
        if (!$student) {
            return response()->json([], 404);
        }

        $student->delete();
        return response()->json([], 200);
    }

    public function list()
    {
        $students = Student::with('teacher')->paginate(5);
        return view('content.student.list', compact('students'));
    }

    public function add()
    {
        $teachers = Teacher::all(); 
        return view('content.student.add', compact('teachers'));
    }
    public function insert(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required|date|before:' . Carbon::now()->addDay()->format('Y-m-d'),
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->dob = $request->dob;
        $student->id_teacher = $request->id_teacher; // Jika Anda ingin menyimpan id_teacher
        $student->save();

        return redirect('/student');
    }
}
