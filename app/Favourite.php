<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    //
    /**
     * @var mixed
     */
    private $userId;
    /**
     * @var mixed
     */
    private $productId;
}
