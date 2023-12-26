<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'feedback',
        'auth_user_id',
        'created_by',
        'updated_by',

    ];


    public function branchUser()
    {
        return $this->belongsTo(User::class,'id');
    }
}
