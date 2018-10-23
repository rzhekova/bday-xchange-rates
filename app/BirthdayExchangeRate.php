<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthdayExchangeRate extends Model {
    
    protected $casts = [
        'exchange_rates' => 'object'
    ];

    protected $fillable = [
        'date', 'exchange_rates', 'formatted_date'
    ];
}
