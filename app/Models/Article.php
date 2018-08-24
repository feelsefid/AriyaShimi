<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_categories_id',
        'name',
        'text',
        'image',
        'view',
        'show_view_more',
        'summary_character_count',
        'status',
        'language',
        'title_seo',
        'keyword_seo',
        'description_seo'
    ];

    public function article_categories() {
        return $this->belongsTo('App\Models\ArticleCategory', 'article_categories_id', 'id');
    }
}
