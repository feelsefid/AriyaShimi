<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioCategory extends Model
{
    public function articles() {
        return $this->hasMany('App\Models\Portfolio', 'portfolio_categories_id', 'id');
    }
}
