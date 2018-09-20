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
        $title="مقالات علمی";
        return view('site.article.index', compact('data','title'));
    }

    public function article_show($id)
    {
        $data = Article::find($id);
        $title=$data->name;
        return view('site.article.article_show', compact('data','title'));
    }

    public function blogs()
    {
        $data = ArticleCategory::with('articles')->where('module', 'blogs')->first();
        $title="اخبار و رویداد ها";
        return view('site.article.blog', compact('data','title'));
    }

    public function show($id)
    {
        $data = Article::find($id);
        $title=$data->name;
        return view('site.article.show', compact('data','title'));
    }

    public function faq()
    {
        $data = ArticleCategory::with('articles')->where('module', 'faq')->first();
        $title="پرسش و پلسخ";
        return view('site.article.faq', compact('data','title'));
    }
}
