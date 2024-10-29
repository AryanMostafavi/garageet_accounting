<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherEntity extends Model
{
    use HasFactory;
    protected $fillable = ['voucher_id', 'account_title', 'debit', 'credit'];
    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }
}
