<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Communicate;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $users = User::all();
        return view('home', compact('users'));
    }

    public function filtered($filter = 'art') {
        if(!in_array($filter, ['art', 'music', 'sport', 'F', 'M'])) {
            $locale = '/';
        }
        if(in_array($filter, ['art', 'music', 'sport'])) {
            $users = User::where('hobby', $filter)->get();
        } else {
            $users = User::where('gender', $filter)->get();
        }
        return view('home', compact('users'));
    }

    public function create(Request $request) {
        $user_1 = User::find(auth()->user()->id);
        $user_2 = User::find($request->id);

        // $matched = Communicate::where('user_1', $user_2)->where('user_2', $user_1)->get();

        // dd($matched);

        $communicate = [
            'user_1' => $user_1->id,
            'user_2' => $user_2->id,
            'relation' => 0
        ];
        Communicate::create($communicate);

        // if(!$matched) {
        //     $communicate = [
        //         'user_1' => $user_1->id,
        //         'user_2' => $user_2->id,
        //         'relation' => 0
        //     ];
        //     Communicate::create($communicate);
        // } else {
        //     $matched->relation = 1;
        //     Communicate::find($matched->id)->update($matched);
        // }

        return redirect('/wishlist');
    }
}
