<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $table = 'sale_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array'celp
     */
    protected $fillable = [
        'sale_id', 'product_id', 'amount', 'value'
    ];

    public function sale()
    {
        return $this->belongsTo('App\Sale');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    
}
