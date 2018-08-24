<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu_categories_id',
        'parent_id',
        'name',
        'slug',
        'image',
        'menu_type',
        'sort_order',
        'status',
        'language'
    ];

    public function menu_categories() {
        return $this->belongsTo('App\Models\MenuCategory');
    }
}
