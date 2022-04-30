<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admain extends Model
{
    public $table = "admain";

    protected $fillable = [ 'name','email', 'password'];
    public $timestamps = false;

}
