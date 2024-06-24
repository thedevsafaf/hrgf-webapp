<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_id'];

    public function excavations()
    {
        return $this->hasMany(Excavation::class);
    }
}
