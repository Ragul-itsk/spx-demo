<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];


    protected $fillable = [

        'branch_id',
        'name',
        'mobile',
        'dob',
        'lead_source_id',
        'location',
        'date',
        'isActive',
        'alternative_mobile',
        'auth_user_id',
        'created_by',
        'updated_by',

    ];

    public function leadSource()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id'); // Assuming 'lead_source' is the foreign key column
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bankdetails()
    {
        return $this->hasMany(bank_detail::class, 'user_id');
    }

    public function payment()
    {
        return $this->hasMany(deposit::class, 'user_id');
    }

    public function platformDetails()
    {
        return $this->hasMany(PlatformDetails::class, 'player_id');
    }
}
