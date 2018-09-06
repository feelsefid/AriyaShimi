<?php

namespace App\Http\Controllers\Site;

use App\Models\ArticleCategory;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Setting;
class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='محصولات';
        $portfolios=Portfolio::orderByDesc('id')->paginate(6);
        return view('site.portfolio.index',compact('portfolios','title'));
    }

    public function loadmore($category_id = null)
    {
        $portfolios=Portfolio::orderByDesc('name');
        if($category_id != null)
            $portfolios = $portfolios->where('portfolio_categories_id', $category_id);
        $portfolios = $portfolios->paginate(6);
        return view('site.portfolio.items',compact('portfolios', 'category_id'));
    }

    public function indexWithCategory($category_id)
    {
        $title=PortfolioCategory::find($category_id)->name;
        $portfolios=Portfolio::where('portfolio_categories_id',$category_id)->paginate(6);
        return view('site.portfolio.index',compact('portfolios','title', 'category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio=Portfolio::find($id);
        $title=$portfolio->name;
        $vizhegies=json_decode($portfolio->vizhegi);
        return view('site.portfolio.show',compact('portfolio','vizhegies','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
