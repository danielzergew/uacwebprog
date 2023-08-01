@include('navbar')
@extends('master')

@section('title', 'Home')

@section('body')
<Section>
    <p class="text-center font-bold text-5xl">Your Friend</p>
</Section>
<section class="bg-gray-50">
    <div class="grid grid-cols-3 gap-5 p-5">
        @foreach($users as $user)
            <?php
                if($user->User2->hobby == 'Art') {
                    $image = 'art.jpeg';
                } else if ($user->User2->hobby == 'Music') {
                    $image = 'music.jpeg';
                } else {
                    $image = 'sport.jpeg';
                }
            ?>
            <div action="/addwishlist" method="POST" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @csrf
                <img class="rounded-t-lg" src="{{ asset($image) }}" alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user->User2->username }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">hobby: <b>{{ $user->User2->hobby }}</b></p>
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center gap-3" type="button">
                        Make a call
                        <span class="material-symbols-outlined">
                            videocam
                        </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

<div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-6 text-center">
                <img class="rounded-t-lg w-full" src="{{ asset($image) }}" alt="" />
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Calling...</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    Turn off call
                </button>
                <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Mute</button>
            </div>
        </div>
    </div>
</div>
