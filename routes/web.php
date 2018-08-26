<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

/*****************************************************
-- Site Routes
 ****************************************************/

Route::group(['namespace' => 'Site'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'AboutController@index')->name('about');
    Route::get('/portfolio', 'PortfolioController@index');
    Route::get('/portfolio/{category_id}/cat', 'PortfolioController@indexWithCategory');
    Route::get('/portfolio/loadmore', 'PortfolioController@loadmore');
    Route::get('/portfolio/{id}/{title}', 'PortfolioController@show');
    Route::get('/articles', 'ArticleController@index');
    Route::get('/articles/{id}/', 'ArticleController@article_show');
    Route::get('/articles/{id}/{title}', 'ArticleController@article_show');
    Route::get('/blogs', 'ArticleController@blogs');
    Route::get('/blogs/{id}', 'ArticleController@show');
    Route::get('/blogs/{id}/{title}', 'ArticleController@show');
    Route::get('/faq', 'ArticleController@faq');
    Route::get('/contacts', 'ContactsController@index');
    //Route::get(trans('routes.about'), 'AboutController@index');

});

/*****************************************************
-- Admin Routes
 ****************************************************/
Route::group(['prefix' => 'panel', 'namespace' => 'Admin'], function () {
    Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
    Route::post('/ajax', 'AjaxController@index');

    //-- Article --------------------------------------------------------------------------------------
    Route::get('article', 'ArticleController@index')->middleware('permission:view.article');
    Route::get('article/create', 'ArticleController@create')->middleware('permission:create.article');
    Route::post('article', 'ArticleController@store')->middleware('permission:create.article');
    Route::get('article/{id}', 'ArticleController@show')->middleware('permission:view.article');
    Route::get('article/{id}/edit', 'ArticleController@edit')->middleware('permission:edit.article');
    Route::put('article/{id}', 'ArticleController@update')->middleware('permission:edit.article');
    Route::delete('article/{id}', 'ArticleController@destroy')->middleware('permission:delete.article');
    Route::put('article/status/{id}', 'ArticleController@changeStatus')->middleware('permission:edit.article');
    Route::post('article/delete_row/{id}', 'ArticleController@delete_row')->middleware('permission:edit.article');

    //-- Article Category --------------------------------------------------------------------------------------
    Route::get('article_category', 'ArticleCategoryController@index')->middleware('permission:view.article_category');
    Route::get('article_category/create', 'ArticleCategoryController@create')->middleware('permission:create.article_category');
    Route::post('article_category', 'ArticleCategoryController@store')->middleware('permission:create.article_category');
    Route::get('article_category/{id}', 'ArticleCategoryController@show')->middleware('permission:view.article_category');
    Route::get('article_category/{id}/edit', 'ArticleCategoryController@edit')->middleware('permission:edit.article_category');
    Route::put('article_category/{id}', 'ArticleCategoryController@update')->middleware('permission:edit.article_category');
    Route::delete('article_category/{id}', 'ArticleCategoryController@destroy')->middleware('permission:delete.article_category');
    Route::put('article_category/status/{id}', 'ArticleCategoryController@changeStatus')->middleware('permission:edit.article_category');
    Route::post('article_category/delete_row/{id}', 'ArticleCategoryController@delete_row')->middleware('permission:edit.article_category');

    //-- Portfolio --------------------------------------------------------------------------------------
    Route::get('portfolio', 'PortfolioController@index')->middleware('permission:view.portfolio');
    Route::get('portfolio/create', 'PortfolioController@create')->middleware('permission:create.portfolio');
    Route::post('portfolio', 'PortfolioController@store')->middleware('permission:create.portfolio');
    Route::get('portfolio/{id}', 'PortfolioController@show')->middleware('permission:view.portfolio');
    Route::get('portfolio/{id}/edit', 'PortfolioController@edit')->middleware('permission:edit.portfolio');
    Route::put('portfolio/{id}', 'PortfolioController@update')->middleware('permission:edit.portfolio');
    Route::delete('portfolio/{id}', 'PortfolioController@destroy')->middleware('permission:delete.portfolio');
    Route::put('portfolio/status/{id}', 'PortfolioController@changeStatus')->middleware('permission:edit.portfolio');
    Route::post('portfolio/delete_row/{id}', 'PortfolioController@delete_row')->middleware('permission:edit.portfolio');

    //-- Portfolio Category --------------------------------------------------------------------------------------
    Route::get('portfolio_category', 'PortfolioCategoryController@index')->middleware('permission:view.portfolio_category');
    Route::get('portfolio_category/create', 'PortfolioCategoryController@create')->middleware('permission:create.portfolio_category');
    Route::post('portfolio_category', 'PortfolioCategoryController@store')->middleware('permission:create.portfolio_category');
    Route::get('portfolio_category/{id}', 'PortfolioCategoryController@show')->middleware('permission:view.portfolio_category');
    Route::get('portfolio_category/{id}/edit', 'PortfolioCategoryController@edit')->middleware('permission:edit.portfolio_category');
    Route::put('portfolio_category/{id}', 'PortfolioCategoryController@update')->middleware('permission:edit.portfolio_category');
    Route::delete('portfolio_category/{id}', 'PortfolioCategoryController@destroy')->middleware('permission:delete.portfolio_category');
    Route::put('portfolio_category/status/{id}', 'PortfolioCategoryController@changeStatus')->middleware('permission:edit.portfolio_category');
    Route::post('portfolio_category/delete_row/{id}', 'PortfolioCategoryController@delete_row')->middleware('permission:edit.portfolio_category');

    //-- Menu --------------------------------------------------------------------------------------
    Route::get('menu', 'MenuController@index')->middleware('permission:view.menu');
    Route::get('menu/create', 'MenuController@create')->middleware('permission:create.menu');
    Route::post('menu', 'MenuController@store')->middleware('permission:create.menu');
    Route::get('menu/{id}', 'MenuController@show')->middleware('permission:view.menu');
    Route::get('menu/{id}/edit', 'MenuController@edit')->middleware('permission:edit.menu');
    Route::put('menu/{id}', 'MenuController@update')->middleware('permission:edit.menu');
    Route::delete('menu/{id}', 'MenuController@destroy')->middleware('permission:delete.menu');
    Route::put('menu/status/{id}', 'MenuController@changeStatus')->middleware('permission:edit.menu');
    Route::post('menu/delete_row/{id}', 'MenuController@delete_row')->middleware('permission:edit.menu');

    //-- Menu Category --------------------------------------------------------------------------------------
    Route::get('menu_category', 'MenuCategoryController@index')->middleware('permission:view.menu_category');
    Route::get('menu_category/create', 'MenuCategoryController@create')->middleware('permission:create.menu_category');
    Route::post('menu_category', 'MenuCategoryController@store')->middleware('permission:create.menu_category');
    Route::get('menu_category/{id}', 'MenuCategoryController@show')->middleware('permission:view.menu_category');
    Route::get('menu_category/{id}/edit', 'MenuCategoryController@edit')->middleware('permission:edit.menu_category');
    Route::put('menu_category/{id}', 'MenuCategoryController@update')->middleware('permission:edit.menu_category');
    Route::delete('menu_category/{id}', 'MenuCategoryController@destroy')->middleware('permission:delete.menu_category');
    Route::put('menu_category/status/{id}', 'MenuCategoryController@changeStatus')->middleware('permission:edit.menu_category');
    Route::post('menu_category/delete_row/{id}', 'MenuCategoryController@delete_row')->middleware('permission:edit.menu_category');

    //-- SlideShow --------------------------------------------------------------------------------------
    Route::get('slide_show', 'SlideShowController@index')->middleware('permission:view.slide_show');
    Route::get('slide_show/create', 'SlideShowController@create')->middleware('permission:create.slide_show');
    Route::post('slide_show', 'SlideShowController@store')->middleware('permission:create.slide_show');
    Route::get('slide_show/{id}', 'SlideShowController@show')->middleware('permission:view.slide_show');
    Route::get('slide_show/{id}/edit', 'SlideShowController@edit')->middleware('permission:edit.slide_show');
    Route::put('slide_show/{id}', 'SlideShowController@update')->middleware('permission:edit.slide_show');
    Route::delete('slide_show/{id}', 'SlideShowController@destroy')->middleware('permission:delete.slide_show');
    Route::put('slide_show/status/{id}', 'SlideShowController@changeStatus')->middleware('permission:edit.slide_show');
    Route::post('slide_show/delete_row/{id}', 'SlideShowController@delete_row')->middleware('permission:edit.slide_show');

    //-- SlideShow Category --------------------------------------------------------------------------------------
    Route::get('slide_show_category', 'SlideShowCategoryController@index')->middleware('permission:view.slide_show_category');
    Route::get('slide_show_category/create', 'SlideShowCategoryController@create')->middleware('permission:create.slide_show_category');
    Route::post('slide_show_category', 'SlideShowCategoryController@store')->middleware('permission:create.slide_show_category');
    Route::get('slide_show_category/{id}', 'SlideShowCategoryController@show')->middleware('permission:view.slide_show_category');
    Route::get('slide_show_category/{id}/edit', 'SlideShowCategoryController@edit')->middleware('permission:edit.slide_show_category');
    Route::put('slide_show_category/{id}', 'SlideShowCategoryController@update')->middleware('permission:edit.slide_show_category');
    Route::delete('slide_show_category/{id}', 'SlideShowCategoryController@destroy')->middleware('permission:delete.slide_show_category');
    Route::put('slide_show_category/status/{id}', 'SlideShowCategoryController@changeStatus')->middleware('permission:edit.slide_show_category');
    Route::post('slide_show_category/delete_row/{id}', 'SlideShowCategoryController@delete_row')->middleware('permission:edit.slide_show_category');

    //-- Team --------------------------------------------------------------------------------------
    Route::get('team', 'TeamController@index')->middleware('permission:view.team');
    Route::get('team/create', 'TeamController@create')->middleware('permission:create.team');
    Route::post('team', 'TeamController@store')->middleware('permission:create.team');
    Route::get('team/{id}', 'TeamController@show')->middleware('permission:view.team');
    Route::get('team/{id}/edit', 'TeamController@edit')->middleware('permission:edit.team');
    Route::put('team/{id}', 'TeamController@update')->middleware('permission:edit.team');
    Route::delete('team/{id}', 'TeamController@destroy')->middleware('permission:delete.team');
    Route::put('team/status/{id}', 'TeamController@changeStatus')->middleware('permission:edit.team');
    Route::post('team/delete_row/{id}', 'TeamController@delete_row')->middleware('permission:edit.team');

    //-- Contact --------------------------------------------------------------------------------------
    Route::get('contact', 'ContactController@index')->middleware('permission:view.contact');
    Route::get('contact/create', 'ContactController@create')->middleware('permission:create.contact');
    Route::post('contact', 'ContactController@store')->middleware('permission:create.contact');
    Route::get('contact/{id}', 'ContactController@show')->middleware('permission:view.contact');
    Route::get('contact/{id}/edit', 'ContactController@edit')->middleware('permission:edit.contact');
    Route::put('contact/{id}', 'ContactController@update')->middleware('permission:edit.contact');
    Route::delete('contact/{id}', 'ContactController@destroy')->middleware('permission:delete.contact');
    Route::put('contact/status/{id}', 'ContactController@changeStatus')->middleware('permission:edit.contact');
    Route::post('contact/delete_row/{id}', 'ContactController@delete_row')->middleware('permission:edit.contact');

    //-- User --------------------------------------------------------------------------------------
    Route::get('user', 'UserController@index')->middleware('permission:view.user');
    Route::get('user/create', 'UserController@create')->middleware('permission:create.user');
    Route::post('user', 'UserController@store')->middleware('permission:create.user');
    Route::get('user/{id}', 'UserController@show')->middleware('permission:view.user');
    Route::get('user/{id}/edit', 'UserController@edit')->middleware('permission:edit.user');
    Route::put('user/{id}', 'UserController@update')->middleware('permission:edit.user');
    Route::delete('user/{id}', 'UserController@destroy')->middleware('permission:delete.user');
    Route::put('user/status/{id}', 'UserController@changeStatus')->middleware('permission:edit.user');

    //-- Permission --------------------------------------------------------------------------------------
    Route::get('permission', 'PermissionController@index')->middleware('permission:view.permission');
    Route::get('permission/create', 'PermissionController@create')->middleware('permission:create.permission');
    Route::post('permission', 'PermissionController@store')->middleware('permission:create.permission');
    Route::get('permission/{id}', 'PermissionController@show')->middleware('permission:view.permission');
    Route::get('permission/{id}/edit', 'PermissionController@edit')->middleware('permission:edit.permission');
    Route::put('permission/{id}', 'PermissionController@update')->middleware('permission:edit.permission');
    Route::delete('permission/{id}', 'PermissionController@destroy')->middleware('permission:delete.permission');
    Route::put('permission/status/{id}', 'PermissionController@changeStatus')->middleware('permission:edit.permission');

    //-- Role --------------------------------------------------------------------------------------
    Route::get('role', 'RoleController@index')->middleware('permission:view.role');
    Route::get('role/create', 'RoleController@create')->middleware('permission:create.role');
    Route::post('role', 'RoleController@store')->middleware('permission:create.role');
    Route::get('role/{id}', 'RoleController@show')->middleware('permission:view.role');
    Route::get('role/{id}/edit', 'RoleController@edit')->middleware('permission:edit.role');
    Route::put('role/{id}', 'RoleController@update')->middleware('permission:edit.role');
    Route::delete('role/{id}', 'RoleController@destroy')->middleware('permission:delete.role');
    Route::put('role/status/{id}', 'RoleController@changeStatus')->middleware('permission:edit.role');

    //-- Permission And Role --------------------------------------------------------------------------------------
    Route::get('permission/role/{id}/edit', 'PermissionController@role_edit')->middleware('permission:edit.permission');
    Route::put('permission/role/{id}', 'PermissionController@role_update')->middleware('permission:edit.permission');

    //-- Permission And User ------------------ --------------------------------------------------------------------
    Route::get('permission/user/{id}/edit', 'PermissionController@user_edit')->middleware('permission:edit.permission');
    Route::put('permission/user/{id}', 'PermissionController@user_update')->middleware('permission:edit.permission');

    //-- Password Reset --------------------------------------------------------------------------------------
    Route::get('password/reset', 'ResetPasswordController@index');
    Route::post('password/reset', 'ResetPasswordController@update');

    //-- Setting --------------------------------------------------------------------------------------
    Route::get('setting', 'SettingController@index')->middleware('permission:view.setting');
    Route::get('setting/create', 'SettingController@create')->middleware('permission:create.setting');
    Route::post('setting', 'SettingController@store')->middleware('permission:create.setting');
    Route::get('setting/{id}', 'SettingController@show')->middleware('permission:view.setting');
    Route::get('setting/{id}/edit', 'SettingController@edit')->middleware('permission:edit.setting');
    Route::put('setting/{id}', 'SettingController@update')->middleware('permission:edit.setting');
    Route::delete('setting/{id}', 'SettingController@destroy')->middleware('permission:delete.setting');
    Route::put('setting/status/{id}', 'SettingController@changeStatus')->middleware('permission:edit.setting');
    Route::post('setting/delete_row/{id}', 'SettingController@delete_row')->middleware('permission:delete.setting');

    //-- Deg360 --------------------------------------------------------------------------------------
    Route::get('deg360', 'Deg360Controller@index')->middleware('permission:view.article');
    Route::get('deg360/create', 'Deg360Controller@create')->middleware('permission:create.article');
    Route::post('deg360', 'Deg360Controller@store')->middleware('permission:create.article');
    Route::get('deg360/{id}', 'Deg360Controller@show')->middleware('permission:view.article');
    Route::get('deg360/{id}/edit', 'Deg360Controller@edit')->middleware('permission:edit.article');
    Route::put('deg360/{id}', 'Deg360Controller@update')->middleware('permission:edit.article');
    Route::delete('deg360/{id}', 'Deg360Controller@destroy')->middleware('permission:delete.article');
    Route::put('deg360/status/{id}', 'Deg360Controller@changeStatus')->middleware('permission:edit.article');
    Route::post('deg360/delete_row/{id}', 'Deg360Controller@delete_row')->middleware('permission:edit.article');
});