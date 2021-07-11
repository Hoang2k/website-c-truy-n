<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('backend.master');
    }
    public function getListProduct(){
        return view('backend.category.listProduct');
    }
}
