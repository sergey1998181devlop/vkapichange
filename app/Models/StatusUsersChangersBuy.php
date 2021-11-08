<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class StatusUsersChangersBuy extends Model
{


    protected $table = 'status_users_changers_buy';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    public $timestamps = false;
    protected $fillable = [
        'id',
        'user_id',
        'product_id_one',
        'status',
    ];

}
