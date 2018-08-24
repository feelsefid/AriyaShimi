<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Setting;
use App\Models\SlideShow;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArticleCategory::with('articles')->where('module', 'article')->first();

        return view('site.article.index', compact('data'));
    }

    public function blogs()
    {
        $data = ArticleCategory::with('articles')->where('module', 'blog')->first();

        return view('site.article.blog', compact('data'));
    }
}
