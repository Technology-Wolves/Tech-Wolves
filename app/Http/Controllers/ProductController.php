<?php

namespace App\Http\Controllers;

use App\Cart;
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
        return view('layouts.seller.products.create');
    }

    // Add Product Into database
    protected function store(Request $request){
        $request->validate([
            'productName'=> ['required', 'max:255'],
            'productDescription'=>['required', 'max: 2000'],
            'orginalPrice'=>['required'],
            'discountRate' => 'required|numeric|min:0|max:50',
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

        if (request()->hasFile('productImage')){
            $file = request()->file('productImage');
            $extension = $file->getClientOriginalExtension();
            $productImage = time(). '.' . $extension;
            $file->move('uploads/productImage/', $productImage);
            $product->productImage = $productImage;
        }

        $product->save();
        Session::flash('success-message', 'Product Added Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/addProduct');
    }

    // Get all product form the databse
    protected function index(){
        $products = Product::paginate(8);
        return view('products',[
            'products'=>$products
        ]);
    }

    // Get all product of owner
    protected function getAddedProduct(){
        //die('hello');
        $products = Product::Where('productOwnerId',Auth::user()->id)->get();
        //dd($products);
        return view('layouts.seller.products.viewAddedProduct',[
           'products'=>$products
        ]);
    }

    // Edit Product
    protected function editProduct($productId){
        $product = Product::find($productId);
        return view('layouts.seller.products.update', compact('product'));
    }

    // Update Product
    protected function updateProduct(Request $request, $productId){
        $request->validate([
            'productName'=> ['required', 'max:255'],
            'productDescription'=>['required', 'max: 2000'],
            'orginalPrice'=>['required'],
            'discountRate' => 'required|numeric|min:0|max:50',
            'categories'=> ['required'],
            'productImage'=>['required', 'image', 'mimes:jpeg,png,jpg,gif']
        ]);
        $product = Product::find($productId);
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $origPrice = $product->orginalPrice = $request->orginalPrice;
        $disRate = $product->discountRate = $request->discountRate;
        $discountedPrice = ($origPrice * $disRate) / 100;
        $product->discountedPrice = $origPrice - $discountedPrice;
        $product->categories = $request->categories;
        $product->productImage = $request->productImage;

        if (request()->hasFile('productImage')){
            $file = request()->file('productImage');
            $extension = $file->getClientOriginalExtension();
            $productImage = time(). '.' . $extension;
            $file->move('uploads/productImage/', $productImage);
            $product->productImage = $productImage;
        }

        $product->save();
        Session::flash('success-message', 'Product Updated Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/addedProducts');
    }
    protected function deleteProduct($productId){
        Product::destroy($productId);
        Session::flash('success-message', 'Product Deleted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/addedProducts');
    }

    // Get all product form the databse
    protected function adminIndex(){
        $products = Product::paginate(8);
        return view('layouts.admin.viewAllAddedProduct',[
            'products'=>$products
        ]);
    }

    // Delete Product Admin
    protected function adminDeleteProduct($productId){
        Product::destroy($productId);
        Session::flash('success-message', 'Product Deleted Successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/getProductsAdmin');
    }

    // Search Products
    protected function searchProduct(){
        $category = $_GET['categories'];
        $query = $_GET['query'];

        $products = Product::where('productName', 'LIKE', '%'.$query.'%')->where('categories', $category)->get();
        return view('productSearch', compact('products'));
    }

    // Get Add To Cart
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));

        Session::flash('success-message', 'Added to your cart!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/products');
    }

    //
    public  function getCart(){
        if (!Session::has('cart')){
            return view('cart.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.shopping-cart', ['products'=>$cart->items, 'totalPrice'=> $cart->totalPrice]);

    }
}
