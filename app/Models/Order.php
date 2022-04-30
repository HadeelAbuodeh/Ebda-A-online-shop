<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{public $table = "order";

    protected $fillable = [ 'user_id','first_name','last_name','phone','city','area','address','done','date_of_order'];
    public $timestamps = false;
        use HasFactory;

    public function products(){
        return $this->belongsToMany(Product::class,'order_items');
   }
}
