<?php

namespace App\Http\Controllers\Chapter;

use App\Models\Chapter;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;

class chapterController extends Controller
{
    public function index(){
        $chapter=Chapter::all();
        $story=Product::ALl();
        return view('backend.chapter.index',[
            'chapter'=>$chapter,
            'story'=>$story,
        ]);
    }
    public function addChapter(Request $request){
        $chapter= new Chapter();
        $chapter->title=$request->name;
        $chapter->slug=$request->slug;
        $chapter->summary=$request->summary;
        $chapter->content=$request->content;
        $chapter->story_id=$request->story;
        $chapter->status=$request->status;
        $chapter->save();
        return redirect()->back()->with('success','Thêm chương thành công');
    }
    public function checkValidate(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'slug'=>'required|max:255',
            'summary'=>'required|min:6',
            'content'=>'required|min:6',
            'story'=>'required',
            'status'=>'required|max:255',
            
        ],[
            'name.required'=>'Tiêu đề không được để trống',
            'slug.required'=>'slug không được để trống',
            'summary.required'=>'Vui lòng  nhập tóm tắt truyện',
            'content.required'=>'Vui lòng  nhập nội dunng chương',
            'story.required'=>'Bạn chưa chọn truyện',

        ]);
    }
    public function getChapterById($id){
        $story=Product::all();
        $chapter=Chapter::find($id);
        return view('backend.chapter.editChapter',[
            'chapter'=>$chapter,
            'story'=>$story
        ]);
        

    }  
    public function updateChapter(Request $request){
        $chapter=Chapter::find($request->id);
        $chapter->title=$request->title;
        $chapter->slug=$request->slug;
        $chapter->summary=$request->summary;
        $chapter->content=$request->content;
        $chapter->story_id=$request->story;
        $chapter->status=$request->status;
        $r=$chapter->save();
        if($r)
        return Redirect()->back()->with('success','Cập nhật chương thành công');
    } 
    public function deleteChapter($id){
       $chapter=Chapter::find($id);
       $chapter->delete();
       return Redirect()->back()->with('success','Xóa chương chương thành công');
    }
}
