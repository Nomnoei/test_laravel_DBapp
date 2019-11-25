<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = ['product_tite','product_data','product_npice','product_spice','product_code','product_pic','product_ship'];
}
