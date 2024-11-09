<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name', 'quantity', 'cost_price', 'selling_price','order_date','order_number'
    ];

    public function goods()
    {
        return $this->hasMany(Good::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }
}
