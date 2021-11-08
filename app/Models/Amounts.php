<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Amounts extends Model
{


    protected $table = 'amounts';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'amount_type',
        'price',
    ];

}
