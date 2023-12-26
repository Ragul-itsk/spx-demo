<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class OurBankDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'bank_name',
        'account_number',
        'ifsc',
        'remarks',
        'status',
        'created_by',
        'updated_by',
    ];

}