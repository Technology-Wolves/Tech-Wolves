<?php

namespace App\Http\Controllers;

use App\Favourite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
}
