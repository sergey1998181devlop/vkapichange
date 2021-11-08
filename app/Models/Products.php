<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Products extends Model
{


    protected $table = 'products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'category_id',
        'user_id',
        'photo',
        'description',
        'photo_id',
        'access_key',
        'name_product',
        'type_product',
        'price'
    ];

    public function user()
    {
        return $this->hasOne(User::class , 'id' , 'user_id' );
    }
    public function categories()
    {
        return $this->hasOne(Categories::class , 'id' , 'category_id');
    }
}
