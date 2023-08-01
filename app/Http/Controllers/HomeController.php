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
        if(!in_array($filter, ['art', 'music', 'sport'])) {
            $locale = '/';
        }
        $users = User::where('hobby', $filter)->get();
        return view('home', compact('users'));
    }

    public function create(Request $request) {
        $user_1 = User::find(auth()->user()->id);
        $user_2 = User::find($request->id);

        $matched = Communicate::where('user_1', $user_2)->where('user_2', $user_1)->get();

        if($matched) {
            $matched->relation = 1;
            $matched->save();
        } else {
            $communicate = [
                'user_1' => $user_1->id,
                'user_2' => $user_2->id,
                'relation' => 0
            ];
            Communicate::create($communicate);
        }

        return redirect('/wishlist');
    }
}
