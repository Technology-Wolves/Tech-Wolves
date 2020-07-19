<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function productOwner(){
        // Belongs to means, Many to one relationship
        return $this->belongsTo(User::class, 'productOwnerId');
    }
}
