<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'path',
        'total_records',
        'duplicate_records',
        'added_records',
        'created_by'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
