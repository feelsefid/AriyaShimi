<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\Deg360;
use App\Models\Setting;
use App\Models\SlideShow;
use function GuzzleHttp\Promise\queue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;
use Mailgun\Mailgun;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::where('status', 1)->where('language', app()->getLocale())->first();
        if($setting->under_construction == 1) {
            if(!Auth::check()) {
                return view('site.underconstruction');
            }
        }

        $title=$setting->title;
        $data = ArticleCategory::with('articles')->where('module', 'home')->first()->toArray();
        $data = array_reverse($data['articles']);
        return view('site.home', compact('setting', 'data','title'));
    }

    public function sendMessage(Request $request)
    {
        $data = ['comment' => $request->input('comment')];
   
        Mail::send('site.contact.mail', $data, function($message) use ($request) {
             $message->to('info@mananeshan.com', 'info@mananeshan.com')->subject
                ($request->input('subject'));
             $message->from($request->input('mail'), $request->input('name'));
        });   
        
        flash()->message(trans('general.message_send'))->success()->important();
        return redirect()->back();
    }




}
