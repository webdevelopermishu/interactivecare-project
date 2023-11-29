<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    function products(){
        $products = Product::all();
        return view('products', [
            'products'=>$products,
        ]);
    }
    function product_store(Request $request){
        $request->validate([
            'product_name'=>'required',
            'product_image'=>'required',
            'product_quantity'=>'required',
            'product_price'=>'required',
        ]);
        $photo = $request->product_image;
        $extension = $photo->extension();
        $file_name = $request->product_name .'.'.$extension;
        Image::make($photo)->save(public_path('uploads/products/'.$file_name));
        Product::insert([
            'product_name'=>$request->product_name,
            'product_image'=>$file_name,
            'product_quantity'=>$request->product_quantity,
            'product_price'=>$request->product_price,
            'created_at'=>Carbon::now(),
        ]);
        return back()->with('success', 'Product Added!');
    }
    function product_view($id){
        $product_view = Product::find($id);
        return view('view_product', [
            'product_view'=>$product_view,
        ]);
    }
    function product_edit($id){
        $products = Product::find($id);
        return view('edit_product', [
            'products'=>$products,
        ]);
    }
    function product_update(Request $request, $id){
        if($request->product_image==''){
            Product::find($id)->update([
                'product_name'=>$request->product_name,
                'product_quantity'=>$request->product_quantity,
                'product_price'=>$request->product_price,
            ]);
            return back()->with('success', 'Updated!');
        }
        else{
            $photo = $request->product_image;
            $extension = $photo->extension();
            $file_name = $request->product_name.'.'.$extension;
            Image::make($photo)->save(public_path('uploads/products/'.$file_name));
            Product::find($id)->update([
                'product_name'=>$request->product_name,
                'product_quantity'=>$request->product_quantity,
                'product_price'=>$request->product_price,
                'product_image'=>$file_name,
            ]);
            return back()->with('success', 'Updated!');
        }
    }
    function product_delete($id){
        Product::find($id)->delete();
        return back()->with('success', 'Deleted!');
    }
}
