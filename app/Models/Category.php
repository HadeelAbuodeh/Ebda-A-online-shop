<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "category";

    protected $fillable = [ 'name','photo'];
    public $timestamps = false;

     public function products(){
      return $this->belongsToMany(Product::class,'category_products');
 }
}
