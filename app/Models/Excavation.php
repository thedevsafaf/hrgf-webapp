<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Excavation extends Model
{
    use HasFactory;

    protected $fillable = [
        'engineer',
        'company',
        'location',
        'nature_of_work',
        'images',
        'documents',
        'note',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
