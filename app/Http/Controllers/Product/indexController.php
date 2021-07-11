<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Routing\Controller;

class indexController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('backend.product.index', [
            'product' => $product,
            'category' => $category
        ]);
    }
    public function addProduct(Request $request)
    {

        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('backend/source/images'), $imageName);

        $product = new Product();
        $product->name = $request->name;
        $product->author = $request->author;
        $product->images = $imageName;

        $product->slug_story = $request->slug;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->status = $request->status;
        $product->save();
        return redirect()->back()->with('Thêm truyện thành công');
    }

    public function getProductById($id)
    {
        $product = Product::find($id);
        return response()->json($product);
    }
    public function updateProduct(Request $request)
    {
        //   $image = $request->image;
        //  $imageName = time() . '.' . $image->extension();
        //  $image->move(public_path('backend/source/images'), $imageName);
       

         $product = Product::find($request->id);
         $product->name = $request->name;
         $product->author = $request->author;
       // $product->images = $request->$imageName;
         $product->slug_story = $request->slug;
         $product->description = $request->description;
         $product->category_id = $request->category;
         $product->status = $request->status;
   
        $product->save();
        return response()->json($product);
    }
}
