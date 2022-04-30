<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $table = "cart";

    protected $fillable = [ 'user_id'];
    public $timestamps = false;
    use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'cart_items');
   }
}
