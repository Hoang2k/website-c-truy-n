<?php

namespace App\Http\Controllers\Category;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Routing\Controller;

class categoryController extends Controller
{
     private $category;
     public function __construct(Category $category){
         $this->category=$category;
     }
    public function index(){


        return $this->getCategory();
    }
    public function getCategory(){
      //  $category=new Category();
      $category=Category::all();
       $recort=$this->category->latest('id')->first();
       return view('backend.category.index',[
         'category'=>$category,
       ]

    );

    }
    public function addCategory(Request $request){
       $category=new Category();
       $category->name=$request->name;
       $category->code=$request->code;
       $category->description=$request->description;
       $category->status=$request->status;
       $category->save();
       return response()->json(
         [
           'success'=>true,
           'message'=>'Thêm Danh Mục Thành Công'
         ]
       );
    }
    public function deleteCategory($id){
      $category = Category::find($id);
      $category->delete();
      return response()->json($category);
    }
    public function getCategoryById($id){
    
    $category=Category::find($id);
    return response()->json($category);
    }
    public function updateCategory(Request $request){
      $this->checkValidate($request);
      $id=$request->id;
     // dd($id);
      $category=Category::find($id);
      $category->name=$request->name;
      $category->code=$request->code;
      $category->description=$request->description;
      $category->status=$request->status;
      $category->save();
      return response()->json($category);

    }
    private function checkValidate(Request $request){
      $request->validate([
        'name'=>'required|max:255',
        'code'=>'required|max:255',
        'description'=>'max:255',
      ],[
        'name.required'=>'Tên truyện không được để trống',
        'code.required'=>'slug truyện không được để trống',
        'name.max'=>'Tên quá dài',
        'code.required'=>'Slug truyện quá dài',
      ]);
    }
}
