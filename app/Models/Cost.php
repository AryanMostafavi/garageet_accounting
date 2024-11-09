<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $fillable = ['voucher_id','user_id', 'description', 'amount'];

    public function voucher()
    {
        return $this->belongsTo(Voucher::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
