<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawUtr extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'withdraw_id', 'utr'
    ];

    public function withdraw()
    {
        return $this->belongsTo(Withdraw::class, 'withdraw_id');
    }
}
