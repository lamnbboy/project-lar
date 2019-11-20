<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    //
    protected $table = 'detail_orders';
    protected $primaryKey = ['id_order', 'id_product'];
    public $incrementing = false;
}
