<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Teachers;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create($usertype)
    {
        if($usertype=='teacher')
            return view('auth.register2',compact('usertype'));
        else
            return view('auth.register1',compact('usertype'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request,$usertype)
    {
        $user = User::create(array_merge($request->validated(),[
            'usertype' => $usertype,
            'password' => Hash::make($request->password),
        ]));
        if($user){
            Profile::create(array_merge($request->validated(),[
                'user_id' => $user->id
                ]));
            if($usertype=='teacher'){
                Teachers::create(array_merge($request->validated(),[
                    'user_id' => $user->id,
                    'status'=>'pending',
                    ]));

            }
            event(new Registered($user));

            Auth::login($user);

            // return redirect(RouteServiceProvider::HOME);
            return redirect()->route(auth()->user()->usertype.'.dashboard');
        }
        return back();

    }
}
