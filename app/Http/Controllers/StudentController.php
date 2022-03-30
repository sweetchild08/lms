<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('student.dashboard');
    }

    // public function teachers()
    // {
    //     $teachers=User::where('usertype','teacher')->get();
    //     return view('admin.teacher.index',compact('teachers'));
    // }
}
