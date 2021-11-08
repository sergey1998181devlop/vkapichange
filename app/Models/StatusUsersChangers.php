<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class StatusUsersChangers extends Model
{


    protected $table = 'status_users_changers';
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
        'product_id_two',
        'status',
    ];

}
