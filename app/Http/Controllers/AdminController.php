<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function teachers()
    {
        $teachers=User::where('usertype','teacher')->get();
        return view('admin.teachers',compact('teachers'));
    }
    
    public function students()
    {
        $students=User::where('usertype','student')->get();
        // dd($students);
        return view('admin.students',compact('students'));
    }
    
    public function classes()
    {
        $teachers=User::where('usertype','teacher')->get();
        return view('admin.teacher.index',compact('teachers'));
    }
}
