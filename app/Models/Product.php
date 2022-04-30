<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "product";

    protected $fillable = [ 'name','description','price','photo','available'];
    public $timestamps = false;

    public function categorys(){
        return $this->belongsToMany(Category::class,'category_products','product_id','category_id');
    }
   
}
