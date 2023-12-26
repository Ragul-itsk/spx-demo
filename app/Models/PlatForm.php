<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlatForm extends Model
{
    use HasFactory, SoftDeletes;

   protected $fillable = [
    'name',
     'code',
     'url',
     'isActive',
     'created_by',
     'updated_by',
    ];
}