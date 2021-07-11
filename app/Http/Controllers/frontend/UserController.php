<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index(){
        $category=Category::orderBy('id','DESC')->get();
        $product=Product::orderBy('id','DESC')->get();
       
        return view ('frontend.page.home',[
            'category'=>$category,
            'product'=>$product
        ]);
    }
   
    public function readStories($slug){
        $category=Category::orderBy('id','DESC')->get();
       $story=Product::with('category')->where('slug_story',$slug)->first();
       $chapter=Chapter::with('product')->orderBy('id','ASC')->where('story_id',$story->id)->get();
       $cungdanhmuc=Product::with('Category')->where('category_id',$story->category->id)->whereNotIn('id',[$story->id])->get();
    
       $firstChapter=Chapter::with('product')->orderBy('id','ASC')->where('story_id',$story->id)->first();
      // dd($firstChapter);
        return view('frontend.page.story',[
            'story'=>$story,
            'category'=>$category,
            'chapter'=>$chapter,
            'cungdanhmuc'=>$cungdanhmuc,
            'firstChapter'=>$firstChapter,
        ]);
    }
    public function getCategoryBySlug($slug){
        $category=Category::orderBy('id','DESC')->get();
        $category_id=Category::where('code',$slug)->first();
        $name_category=$category_id->name;
        $story=Product::orderBy('id','DESC')->where('category_id',$category_id->id)->get();
        return view('frontend.page.danhmuc',[
            'category'=>$category,
            'story'=>$story,
            'name_category'=>$name_category
        ]);
    }
    public function getChapter($slug){
        $category=Category::orderBy('id','DESC')->get();
      $story=Chapter::where('slug',$slug)->first();
       $chapter=Chapter::with('Product')->where('slug',$slug)->where('story_id',$story->story_id)->first();
      // dd($chapter);
      $all_chapter=Chapter::with('Product')->orderBy('id','ASC')->where('story_id',$story->story_id)->get();

      $next_chapter=Chapter::where('story_id',$story->story_id)->where('id','>',$chapter->id)->min('slug');
      $max_id=Chapter::where('story_id',$story->story_id)->orderBy('id','DESC')->first();
      $min_id=Chapter::where('story_id',$story->story_id)->orderBy('id','ASC')->first();
      $previous=Chapter::where('story_id',$story->story_id)->where('id','<',$chapter->id)->max('slug');
         return view('frontend.page.chapter',[
             'category'=>$category,
             'story'=>$story,
             'chapters'=>$chapter,
             'all_chapter'=>$all_chapter,
             'next_chapter'=>$next_chapter,
             'max_id'=>$max_id,
             'min_id'=>$min_id,
             'previous'=>$previous
         ]);
    }
}
