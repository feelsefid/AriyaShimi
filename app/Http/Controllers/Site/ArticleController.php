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
    public function show($id)
    {
        $setting = Setting::where('status', 1)->where('language', app()->getLocale())->first();
        $news = Article::find($id);
        $dateTime=explode(" ",$news->created_at);
        $date=explode("-",$dateTime[0]);
        $carbon=\Carbon\Carbon::create($date[0],$date[1]);
        $shamsi = \Morilog\Jalali\jDateTime::strftime('Y-M-d', strtotime($dateTime[0]));
        $exploded=explode('-',$shamsi);
        $year=$exploded[0];
        $month=$exploded[1];
        $day=$exploded[2];
        return view('site.article.show', compact(['news','year','month','day','setting']));
    }
}
