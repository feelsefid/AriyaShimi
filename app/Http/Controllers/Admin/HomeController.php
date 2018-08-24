<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use App\Providers\jDateTime;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\Article;
use Analytics;
use App\Models\User;
use Spatie\Analytics\Period;

class HomeController extends Controller
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
        /*
        $country = Country::pluck('code', 'name');

        $visitorCollection = collect();
        for($i=14;$i>=0;$i--){
            if(count(Analytics::lastDaysVisits(Period::days(7),14,$i,$i))!=0){
                $now=Carbon::now('Asia/Tehran');
                $dayCollection = collect();
                $sub=$now->subDays($i);
                $array=(array) $sub;
                $thisDayCount=Analytics::lastDaysVisits(Period::days(7),14,$i,$i)[0][0];
                $justDate=explode(' ',$array['date']);
                $jalali=\Morilog\Jalali\jDateTime::strftime('%d %B', strtotime($justDate[0]));
                $dayCollection->put('label',$jalali)->put('y',(integer) $thisDayCount);
                $visitorCollection->push($dayCollection);
            }
        }

        $visittors_countries=null;
        if(count(Analytics::fetchByCountry(Period::days(7), 20))!=0) {
            $visittors_countries = Analytics::fetchByCountry(Period::days(7), 20);
        }

        $referrers=null;
        if(count(Analytics::fetchTopReferrers(Period::days(7), 20))!=0) {
            $referrers = Analytics::fetchTopReferrers(Period::days(7), 20);
        }

        $most_page_visitor=null;
        if(count(Analytics::fetchMostVisitedPages(Period::days(7), 15))!=0){
            $most_page_visitor = Analytics::fetchMostVisitedPages(Period::days(7), 15);
        }

        //return $visittors_countries;
        $latest_articles = Article::with('article_categories')->limit(5)->orderBy('created_at')->get();
        $lastlogins=User::orderBy('lastlogin','desc')->limit(5)->get();
        $user = new User;
        $onlines=$user->allOnline();*/
        return view('admin.home',
            compact('latest_articles','lastlogins','onlines','visitorCollection', 'country', 'visittors_countries', 'referrers', 'most_page_visitor')
        );
    }
}
