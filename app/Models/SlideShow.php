<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    public function slide_show_categories() {
        return $this->belongsTo('App\Models\SlideShowCategory');
    }
}
