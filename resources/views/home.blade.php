@include('navbar')
@extends('master')

@section('title', 'Home')

@section('body')
<Section>
    <p class="text-center font-bold text-5xl">Meet Other Users</p>
</Section>
<section class="bg-gray-50">
    <div class="grid grid-cols-3 gap-5 p-5">
        @foreach($users as $user)
            <?php
                if($user->hobby == 'Art') {
                    $image = 'art.jpeg';
                } else if ($user->hobby == 'Music') {
                    $image = 'music.jpeg';
                } else {
                    $image = 'sport.jpeg';
                }
            ?>
            <form action="/addwishlist" method="POST" class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                @csrf
                <img class="rounded-t-lg" src="{{ asset($image) }}" alt="" />
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $user->username }}</h5>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">hobby: <b>{{ $user->hobby }}</b></p>
                    <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                    <button type="submit" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 gap-2">
                        Add to Wishlist
                        <span class="material-symbols-outlined">
                            thumb_up
                        </span>
                    </button>
                </div>
            </form>
        @endforeach
    </div>
</section>
@endsection
