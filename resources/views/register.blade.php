@extends('master')

@section('title', 'Register')

@section('body')
<section class="bg-gray-50">
    @if(session('existed'))
        {{ session('existed') }}
    @endif
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white text-center">
                    Connect Friend Register
                </h1>
                <form class="space-y-4 md:space-y-6" action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <div class="flex justify-around">
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="M" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Male</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="F" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Female</label>
                            </div>
                        </div>
                        @error('gender')
                            <p class="dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="hobby" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hobby</label>
                        <div class="flex justify-around">
                            <div class="flex items-center">
                                <input id="default-radio-1" type="radio" value="Music" name="hobby" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Music</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="Sport" name="hobby" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sport</label>
                            </div>
                            <div class="flex items-center">
                                <input id="default-radio-2" type="radio" value="Art" name="hobby" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Art</label>
                            </div>
                        </div>
                        @error('hobby')
                            <p class="dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram Username <i class="font-thin">(http://www.instagram.com/username)</i></label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="steve" value="{{ old('username') }}">
                        @error('username')
                            <p class="dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <div class="flex items-center">
                            <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="081234567890" value="{{ old('phone') }}">
                        </div>
                        @error('phone')
                            <p class="dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('password')
                            <p class="dark:text-red-300">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Create Account</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                        Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
