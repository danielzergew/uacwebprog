<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communicate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function User1() {
        return $this->belongsTo(User::class, 'user_1');
    }

    public function User2() {
        return $this->belongsTo(User::class, 'user_2');
    }
}
