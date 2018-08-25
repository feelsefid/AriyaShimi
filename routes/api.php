<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getArticleCategoriesList', function () {
    $categories = \App\Models\ArticleCategory::pluck('name', 'id');

    return response()->json($categories);
});
Route::get('getArticleCategory/{id}', function ($id) {
    $categories = \App\Models\ArticleCategory::with('articles')->find($id);

    return response()->json($categories);
});

Route::get('getArticleList/{id}', function ($id) {
    $articles = \App\Models\Article::where('article_categories_id', $id)->pluck('name', 'id');

    return response()->json($articles);
});

Route::get('getArticle/{id}', 'Site\ArticleController@getArticle');

Route::get('getModuleList', function () {
    $modules = \App\Models\Module::where('status', 1)
        ->where('language', app()->getLocale())
        ->pluck('title', 'route');

    return response()->json($modules);
});
