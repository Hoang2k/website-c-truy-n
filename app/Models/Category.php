<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Providers\Responser;

class Category extends Model
{
    use HasFactory;
    protected $table='category';

public function Product(){
    return $this->hasMany('App\Models\Product');
}
     
}
