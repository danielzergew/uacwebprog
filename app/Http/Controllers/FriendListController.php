<?php

namespace App\Http\Controllers;

use App\Models\Communicate;
use Illuminate\Http\Request;

class FriendListController extends Controller
{
    public function index() {
        $users = Communicate::where('user_1', auth()->user()->id)->where('relation', 1)->get();
        return view('friendlist', compact('users'));
    }
}
