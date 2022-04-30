<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    public $table = "order_items";

    protected $fillable = [ 'order_id','product_id'];
    public $timestamps = false;
    use HasFactory;
}
