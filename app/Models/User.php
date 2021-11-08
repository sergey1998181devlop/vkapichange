<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\laravelSpatial\Eloquent\SpatialTrait;

class User extends Model
{

    use SpatialTrait;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'vk_from_id',
        'city_coordinates_y',
        'city_coordinates_x',
        'name',
        'surname',
        'wallet',
        'created_at',
        'updated_at',
        'geometry_point',
        'age',
        'user_action'
    ];
    protected $spatialFields = [
        'geometry_point',
    ];

    public function products()
    {

        return $this->belongsTo(Products::class );
    }
}
