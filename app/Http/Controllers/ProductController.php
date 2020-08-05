<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use App\Rating;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

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
            'productImage'=>['image', 'mimes:jpeg,png,jpg,gif']
        ]);
        $product = Product::find($productId);
        $product->productName = $request->productName;
        $product->productDescription = $request->productDescription;
        $origPrice = $product->orginalPrice = $request->orginalPrice;
        $disRate = $product->discountRate = $request->discountRate;
        $discountedPrice = ($origPrice * $disRate) / 100;
        $product->discountedPrice = $origPrice - $discountedPrice;
        $product->categories = $request->categories;

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
    // Increment Cart Item by 1
    public function getIncrementByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->incrementByOne($id);
        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect('shopping-cart');
    }

    // Reduce Cart Item by 1
    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect('shopping-cart');
    }
    // Delete cart product
    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect('shopping-cart');
    }

    public  function getCart(){
        if (!Session::has('cart')){
            return view('cart.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart.shopping-cart', ['products'=>$cart->items, 'totalPrice'=> $cart->totalPrice]);

    }
    public function getCheckout(){
        if (!Session::has('cart')){
            return view('cart.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('cart.checkout', ['total' => $total]);
    }

    public function postCheckout(Request $request){

        if (!Session::has('cart')){
            return view('cart.shopping-cart');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:25', 'regex:/(^([a-z A-Z]+)(\d+)?$)/u'],
            'email' => 'regex:/^.+@.+$/i',
            'telephone' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:50'],
            'paymentType'=>['required', 'string']
        ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->telephone;
        $order->address = $request->address;
        $order->paymentType = $request->paymentType;
        $order->cart = serialize($cart);
        $order->status = "processing";

        Auth::user()->orders()->save($order);

        Session::forget('cart');
        Session::flash('success-message', 'Checkout Successful, go to dashboard to track your delivery!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/products');
    }

    public function productDetails($product, $productRating){
        $product = Product::where('id', $product)->get();
        $ratings = DB::table('ratings')
            ->join('users', 'users.id', '=', 'ratings.user_id')
            ->join('products', 'products.id', '=', 'ratings.product_id')
            ->select(
                'products.*',
                'users.id AS userId',
                'users.name AS userName',
                'users.email AS userEmail',
                'users.profileImage AS userImage',
                'ratings.comment AS comment',
                'ratings.stars AS stars'
            )
            ->where('ratings.product_id', $productRating)
            ->get();
        return view('/productDetails', ['product' => $product], ['ratings' => $ratings]);
        dd($ratings);
    }

    // Product Review and Ratings
    public function addRatings(Request $request){
        $request->validate([
            'comment'=> ['required', 'max:5000'],
            'stars' => 'required'
        ]);
        $ratings = new Rating();
        $prodId = $request->productId;

        $ratings->product_id = $request->productId;
        $ratings->user_id = Auth::user()->id;
        $ratings->comment = $request->comment;
        $ratings->stars = $request->stars;

        $ratings->save();
        Session::flash('success-message', 'Comment and Rating Posted!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/productDetails/'.$prodId.'/'.$prodId);
    }
}
