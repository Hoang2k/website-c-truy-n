<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table='chapter';
    public $timestamps = false;
    public function Product(){
        return $this->belongsTo('App\Models\Product','story_id','id');
    }
}
