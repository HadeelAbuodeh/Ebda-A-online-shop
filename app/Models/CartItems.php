<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    public $table = "cart_items";

    protected $fillable = [ 'cart_id','product_id'];
    public $timestamps = false;
    use HasFactory;
}
