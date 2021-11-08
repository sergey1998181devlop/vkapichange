<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class KoordLatLngRussia extends Model
{


    protected $table = 'koord_lat_lng_russia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'city',
        'region',
        'federal_district',
        'lat',
        'lng',
    ];

}
