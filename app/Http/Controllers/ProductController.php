<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // Open Add Product View
    protected function create(){
        return view('products.create');
    }

    // Add Product Into database
    protected function store(Request $request){
        $request->validate([
            'productName'=> ['required', 'max:255'],
            'productDescription'=>['required', 'max: 2000'],
            'orginalPrice'=>['required'],
            'discountRate' => 'required|numeric|min:5|max:50',
            'categories'=> ['required'],
            'productImage'=>['required', 'image', 'mimes:jpeg,png,jpg,gif']
        ]);
        $product = new Product;

        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $origPrice = $product->orginalPrice = $request->orginalPrice;
        $disRate = $product->discountRate = $request->discountRate;
        $discountedPrice = ($origPrice * $disRate) / 100;
        $product->discountedPrice = $origPrice - $discountedPrice;
        $product->categories = $request->categories;
        $product->productImage = $request->productImage;
        $user = Auth::user();
        $product->productOwnerId = $user->id;
        $product->productOwner = $user->name;

        if (request()->hasFile('productImage')){
            $file = request()->file('productImage');
            $extension = $file->getClientOriginalExtension();
            $productImage = time(). '.' . $extension;
            $file->move('uploads/productImage/', $productImage);
            $product->productImage = $productImage;
        }

        $product->save();
        Session::flash('message', 'Product Added Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/addProduct');
    }

    // Get all product form the databse
    protected function index(){
        $products = Product::latest()->get();
        return view('products',[
            'products'=>$products
        ]);
    }
}
