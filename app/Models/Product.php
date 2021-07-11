<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';

    protected $dates=[
        'craete_at',
        'update_at'
    ];
    public function Category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function Chapter(){
        return $this->hasMany('App\Models\Chapter');
    }
}
