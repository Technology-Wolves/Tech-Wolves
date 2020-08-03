<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FavouriteController extends Controller
{
    // Add Favourite
    public function addFavourite($productId){
        $favourite = new Favourite();
        $user = Auth::user();
        $favourite->userId = $user->id;
        $favourite->productId = $productId;

        $favourite->save();
        Session::flash('success-message', 'Product Added To Favourites!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/productDetails/'.$productId);
    }

    public function getFavourites(){
        $favourites = DB::table('favourites')
            ->join('users', 'users.id', '=', 'favourites.userId')
            ->join('products','products.id', '=', 'favourites.productId')
            ->where('favourites.userId', Auth::user()->id)
            ->get();
//        dd($favourites);
        return view('/layouts/buyer/favourites', compact('favourites'));
    }

    public function removeFavourites($id){
        Favourite::where('fav_id', $id)->delete();
        Session::flash('success-message', '1 Favourites Removed!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/favourites');
    }
}
