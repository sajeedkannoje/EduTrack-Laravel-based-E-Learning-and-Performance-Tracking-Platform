<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [

        'full_name',
        'email',
        'address',
        'payer_id',
        'net_amount',
        'total_amount',
        'paypal_fee',
        'currency',
        'transaction_date',
        'user_id',
        'transaction_id',
    ];

    public function user()
    {
        return $this->HasOne(User::class);
    }
}
