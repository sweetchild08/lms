<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Profile;
use App\Models\Teachers;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = User::create(array_merge($request->validated(),[
            'usertype' => 'teacher',
            'password' => Hash::make($request->password),
        ]));
        if($user){
            Profile::create(array_merge($request->validated(),[
                'user_id' => $user->id
                ]));
                Teachers::create(array_merge($request->validated(),[
                    'user_id' => $user->id,
                    'status'=>'pending',
                    ]));
            event(new Registered($user));
            return response([
                'status'=>'success',
                'message'=>'Teacher added'
            ]);

        }
        return back();
    }
    public function destroy(User $teacher)
    {
        if($teacher->delete()){
            return response([
                'status'=>'success',
                'message' => 'deleted successfully'
            ]);
        }
    }
}
