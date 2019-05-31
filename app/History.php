<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Currency;

class History extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_in_id', 'amount_in', 'currency_out_id', 'amount_out',
    ];

}
