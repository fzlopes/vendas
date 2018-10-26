<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = 'sales';

    /**
     * The attributes that are mass assignable.
     *
     * @var array'celp
     */
    protected $fillable = [
        'user_id', 'client_id', 'paymentType_id', 'sale_date', 'sale_total'
    ];

    protected $dates = [
        'sale_date'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function paymentType()
    {
        return $this->belongsTo('App\PaymentType','paymentType_id');
    }
}
