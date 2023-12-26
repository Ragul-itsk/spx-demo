<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepositeSetting extends Model
{
    use HasFactory;
    protected $fillable=[

        'player_cre_gen',
    ];
}