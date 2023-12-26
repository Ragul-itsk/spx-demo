<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bank_detail extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [

        'player_id',
        'account_name',
        'account_number',
        'ifsc_code',
        'upi',
        'bank_name',
        'created_by',
        'updated_by',

    ];


    public function platformDetail()
    {
        return $this->belongsTo(PlatformDetails::class, 'platform_details_id');
    }

    public function player()
    {
        return $this->belongsTo(UserRegistration::class, 'player_id');
    }

    // public function platform()
    // {
    //     return $this->belongsTo(PlatForm::class, 'user_id');
    // }

}