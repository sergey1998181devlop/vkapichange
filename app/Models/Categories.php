<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{


    protected $table = 'catalog_category_main';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'title',
        'titleEng',
        'section_description',
        'parentId',
        'level',

    ];
    public function products()
    {
        return $this->belongsTo(Products::class , 'category_id');
    }

}
