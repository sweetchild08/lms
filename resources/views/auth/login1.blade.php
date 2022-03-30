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
                <div class="flex items-center justify-center">
                   <svg fill="none" viewBox="0 0 24 24" class="w-12 h-12 text-blue-500" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                   </svg>
                </div>
                <h2 class="text-4xl tracking-tight">
                   Sign in 
                </h2>
          </div>
          <div class="flex justify-center my-2 mx-4 md:mx-0">
             <form class="w-full max-w-xl bg-white rounded-lg shadow-md p-6" action="{{route('login')}}" method="post">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                   <div class="w-full md:w-full px-3 mb-6">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='login'>Email address/Username</label>
                      <input name="login" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='login'  id="login" autofocus>
                      @error('login')
                          <small class="text-red-500 mr-2">{{$message}}</small>
                      @enderror
                   </div>
                   <div class="w-full md:w-full px-3 mb-6">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for='Password'>Password</label>
                      <input name="password" class="appearance-none block w-full bg-white text-gray-900 font-medium border border-gray-400 rounded-lg py-3 px-3 leading-tight focus:outline-none" type='password' id="password">
                      @error('password')
                            <small class="text-red-500 mr-2">{{$message}}</small>
                        @enderror
                   </div>
                   <div class="w-full flex items-center justify-between px-3 mb-3 ">
                      <label for="remember" class="flex items-center w-1/2">
                         <input type="checkbox" name="remember" id="remember" class="mr-1 bg-white shadow">
                         <span class="text-sm text-gray-700 pt-1">Remember Me</span>
                      </label>
                      <div class="w-1/2 text-right">
                         <a href="#" class="text-blue-500 text-sm tracking-tight">Forget your password?</a>
                      </div>
                   </div>
                   <div class="w-full md:w-full px-3 mb-6">
                      <button type="submit" class="appearance-none block w-full bg-blue-600 text-gray-100 font-bold border border-gray-200 rounded-lg py-3 px-3 leading-tight hover:bg-blue-500 focus:outline-none focus:bg-white focus:border-gray-500">Sign in</button>
                   </div>
                   <div class="mx-auto -mb-6 pb-1">
                     <span class="text-center text-xs text-gray-700">or sign up as</span>
                  </div>
                  <div class="flex items-center justify-between w-full mt-2">
                     <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                        <a href="{{route('register','student')}}" class="transition duration-200 border border-gray-200 text-gray-500 w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-normal text-center inline-block">Student</a>
                     </div>
                     <div class="w-full md:w-1/3 px-3 pt-4 mx-2 border-t border-gray-400">
                        <a href="{{route('register','teacher')}}" class="transition duration-200 border border-gray-200 text-gray-500 w-full py-2.5 rounded-lg text-sm shadow-sm hover:shadow-md font-normal text-center inline-block">Teacher</a>
                     </div>
                  </div>
                </div>
             </form>
          </div>
        </div>
    </body>
</html>
