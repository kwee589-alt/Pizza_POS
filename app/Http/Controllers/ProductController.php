<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    // add products page
    public function addProducts(){

        $categories = Category::get();

        return view('admin.products.addProducts',compact('categories'));
    }


    // create product
    public function addProductsCreate(Request $request){
        $this->checkProductValidation($request,"create");
       $product = $this->getProductData($request);

       if($request->hasFile('image')){
         // Cloudinary ပေါ်တင်ပြီး URL ယူခြင်း
        $image = $request->file('image');
        $product['image'] = Cloudinary::upload($image->getRealPath())->getSecurePath();
       }
       Product::create($product);
        Alert::success('Product Create', 'Product Created Successfully...');


                 return to_route('List#productsList');

    }


    // request product data
    private function getProductData($request){
        return [

            'name'         =>  $request->name,
            'price'        =>  $request->price,
            'description'  =>  $request->description,
            'category_id'  =>  $request->categoryId,
            'stock'        =>  $request->stock

        ];
    }





    // check product validation
    public function checkProductValidation($request,$action){
        $rules =[
            'name'  => 'required|unique:products,name,' . $request->productId ,
            'categoryId'  => 'required',
            'price'  => 'required|numeric|min:1',
            'stock'  => 'required|numeric|max:999',
            'description'  => 'required|max:2000',
        ];

        $rules['image'] = $action == 'create'  ?   'required|mimes:png,jpg,jpeg,webp,svg|file'  :  'mimes:png,jpg,jpeg,webp,svg|file';

        $message = [];

        $request->validate($rules,$message);
    }

     //  products list page
    public function productsList($amt = 'default'){

        $products = Product::select('categories.title as category_name','products.id','products.name','products.image','products.price','products.category_id','products.stock')
        ->leftJoin('categories','products.category_id','categories.category_id')
        ->when(request('searchKey'),function($query){
            $query->whereAny(['products.name','categories.title'] , 'like', '%'.request('searchKey').'%');
        });

        if($amt != 'default') {
            $products = $products->where('stock',"<=",3);
        }


        $products = $products->orderBy('products.created_at','desc')->get();
        return view('admin.List.productsList',compact('products'));
    }

    //update page

    public function updatePage($id){
        $categories = Category::get();
        $product = Product::where('id',$id)->first();

        return view('admin.products.edit',compact('product','categories'));
    }

    //update product

    public function update(Request $request){
         $this->checkProductValidation($request,'update');
    $product = $this->getProductData($request);

    if ($request->hasFile('image')) {
        // Cloudinary ပေါ်တင်ပြီး URL ယူခြင်း
        $image = $request->file('image');
        $product['image'] = Cloudinary::upload($image->getRealPath())->getSecurePath();
    } else {
        $product['image'] = $request->oldPhoto;
    }

    Product::where('id', $request->productId)->update($product);
    Alert::success('Product Update', 'Product Updated Successfully...');
    return to_route('List#productsList');



    }
}
