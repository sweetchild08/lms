<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <div class="text-center mt-24">
                <div class="flex items-center justify-center p-5">
                   <svg fill="none" viewBox="0 0 24 24" class="w-12 h-12 text-blue-500" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                   </svg>
                </div>
                <h2 class="text-4xl tracking-tight">
                  Sign Up <span class="uppercase"><br>({{$usertype}})</span>
               </h2>
               <span class="text-sm">or <a href="{{route('register','teacher')}}" class="text-blue-500"> 
                  sign up as teacher
               </a>
             </span>
          </div>
          <div class="flex justify-center my-2 mx-4 md:mx-0">
             <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6" action="{{route('register','student')}}" method="post">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='first_name'>First Name</label>
                        <input name="first_name" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='first_name' value="{{old('first_name')}}"  id="first_name" autofocus>
                        @error('first_name')
                            <small class="text-red-500 mr-2">{{$message}}</small>
                        @enderror
                     </div>
                     <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='middle_name'>Middle Name</label>
                        <input name="middle_name" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='middle_name' value="{{old('middle_name')}}"  id="middle_name" autofocus>
                        @error('middle_name')
                            <small class="text-red-500 mr-2">{{$message}}</small>
                        @enderror
                     </div>
                     <div class="w-full md:w-full px-3 mb-6">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='last_name'>Last Name</label>
                        <input name="last_name" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='last_name' value="{{old('last_name')}}"  id="last_name" autofocus>
                        @error('last_name')
                            <small class="text-red-500 mr-2">{{$message}}</small>
                        @enderror
                     </div>
                   <div class="w-full md:w-full px-3 mb-6">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='username'>Username</label>
                      <input name="username" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='username' value="{{old('username')}}"  id="username" autofocus>
                      @error('username')
                          <small class="text-red-500 mr-2">{{$message}}</small>
                      @enderror
                   </div>
                   <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='email'>Email address</label>
                    <input name="email" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='email' value="{{old('email')}}"  id="email">
                    @error('email')
                        <small class="text-red-500 mr-2">{{$message}}</small>
                    @enderror
                 </div>
                   <div class="w-full md:w-full px-3 mb-6">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">Password</label>
                      <input name="password" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='password' value="" id="password">
                      @error('password')
                            <small class="text-red-500 mr-2">{{$message}}</small>
                        @enderror
                   </div>
                   
                   <div class="w-full md:w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="pasword_confirmation">Password Confirmation</label>
                    <input name="password_confirmation" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='password' id="password_confirmation">
                 </div>
                  <div class="w-full md:w-full px-3 mb-6">
                     <button type="submit" class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Register</button>
                  </div>
                  
                  <div class="flex justify-center w-full">
                     <span class="text-sm">already have an account? <a href="{{route('login')}}" class="text-blue-500"> 
                           Sign in
                        </a>
                     </span>
                  </div>
                </div>
             </form>
          </div>
        </div>
    </body>
</html>
