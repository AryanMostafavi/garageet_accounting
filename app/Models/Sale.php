<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['voucher_id', 'item_name', 'quantity', 'unit_price', 'total_price'];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
}
