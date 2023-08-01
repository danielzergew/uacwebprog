<?php

namespace App\Http\Controllers;

use App\Models\Communicate;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index() {
        $users = Communicate::where('user_1', auth()->user()->id)->where('relation', 0)->get();
        return view('wishlist', compact('users'));
    }
}
