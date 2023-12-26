<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_id',
        'platform_id',
        'platform_username',
        'platform_password',
        'status',
    ];

    public function player()
    {
        return $this->belongsTo(UserRegistration::class, 'player_id');
    }
    public function platform()
    {
        return $this->belongsTo(PlatForm::class, 'platform_id');
    }

    public function deposit()
    {
        return $this->hasMany(deposit::class, 'platform_detail_id');
    }
    public function bank()
    {
        return $this->hasMany(bank_detail::class, 'platform_detail_id');
    }
}