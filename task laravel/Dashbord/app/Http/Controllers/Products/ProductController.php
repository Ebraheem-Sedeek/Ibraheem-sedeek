<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('product')->get();
        return view('Allproduct.index',compact('products'));
    }


    public function creat()
    {
        $brands = DB::table('brands')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();

        $subcategories = DB::table('subcategories')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();

    return view('Allproduct.creat',compact('brands','subcategories'));
    }


    public function edit($id)
    {
        $product = DB::table('product')->where('id','=',$id)->first();
        $brands = DB::table('brands')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();

        $subcategories = DB::table('subcategories')->select('id','name_en','name_ar')->orderBy('name_en')->orderBy('id')->get();

    return view('Allproduct.edit',compact('product','brands','subcategories'));
    }

    public function store(Request $request)
    {

        $data = $request->except('_token','image');
        $request->validate([
            'name_en'=>['required','max:512'],
            'name_ar'=>['required','max:512'],
            'Code'=>['required','integer','digits:6','unique:product,code'],
            'Price'=>['required','numeric','between:1,999999.99'],
            'quantity'=>['nullable','integer','between:1,999'],
            'status'=>['nullable','in:0,1'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['nullable','integer','exists:subcategories,id'],
            'details_en'=>['required'],
            'details_ar'=>['required'],
            'image'=>['required','max:1024','mimes:jpg,png']
        ] );
        $photoName = $request->image->hashName();
        $photoPath = public_path('images\product');
        $request->image->move($photoPath,$photoName);
        $data['image'] = $photoName;
        DB::table('product')->insert($data);
        return redirect()->back()->with('success','Product Created successfuly');
    }


    public function update(Request $request,$id)
    {
// dd($request->all(),$id);
        $data = $request->except('_token','image','_method');
        $request->validate([
            'name_en'=>['required','max:512'],
            'name_ar'=>['required','max:512'],
            'Code'=>['required','integer','digits:6','unique:product,code,'.$id.',id'],
            'Price'=>['required','numeric','between:1,999999.99'],
            'quantity'=>['required','integer','between:1,999'],
            'status'=>['required','in:0,1'],
            'brand_id'=>['nullable','integer','exists:brands,id'],
            'subcategory_id'=>['nullable','integer','exists:subcategories,id'],
            'details_en'=>['required'],
            'details_ar'=>['required'],
            'image'=>['nullable','max:1024','mimes:jpg,png']
        ] );
        if($request->has('image')){
            $product = DB::table('product')->select('image')->where('id',$id)->first();
            $photoPath = public_path('images\product');
            $oldImagePath = $photoPath .'\\'.$product->image;
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }

        $photoName = $request->image->hashName();

        $request->image->move($photoPath,$photoName);
        $data['image'] = $photoName;
        }
        DB::table('product')->where('id',$id)->update($data);
        return redirect()->back()->with('success','Product updated successfuly');

    }

    public function delete($id)
    {
        $product = DB::table('product')->select('image')->where('id',$id)->first();
        $photoPath = public_path('images\product');
            $oldImagePath = $photoPath .'\\'.$product->image;
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }
            DB::table('product')->where('id',$id)->delete();
            return redirect()->back()->with('success','Product Deleted successfuly');
    }
}
