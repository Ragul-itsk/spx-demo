<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PDO;

class deposit extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [

        'platform_detail_id',
        'utr',
        'deposit_amount',
        'bonus',
        'total_deposit_amount',
        'image',
        'remark',
        'isInformed',
        'admin_status',
        'banker_status',
        'status',
        'created_by',
        'updated_by',
        'our_bank_detail_id',

    ];

    public function platformDetail()
    {
        return $this->belongsTo(PlatformDetails::class, 'platform_detail_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function leadSource()
    {
        return $this->belongsTo(LeadSource::class, 'lead_source_id'); // Assuming 'lead_source' is the foreign key column
    }

    public function ourBankDetail()
    {
        return $this->belongsTo(OurBankDetail::class, 'our_bank_detail_id');
    }
}
