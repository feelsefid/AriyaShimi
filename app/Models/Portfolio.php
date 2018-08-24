<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function portfolio_categories() {
        return $this->belongsTo('App\Models\PortfolioCategory', 'portfolio_categories_id', 'id');
    }
}
