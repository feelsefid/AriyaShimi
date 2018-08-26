<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
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
        $setting = Setting::where('status', 1)->where('language', app()->getLocale())->first();
        $title="تماس با ما";
        return view('site.contact.index', compact('setting','title'));
    }
    
    
    public function sendMessage(Request $request)
    {
        $data = ['comment' => $request->input('comment')];
   
        Mail::send('site.contact.mail', $data, function($message) use ($request) {
             $message->to('info@ariashimi.com', 'info@ariashimi.com')->subject
                ($request->input('subject'));
             $message->from($request->input('mail'), $request->input('name'));
        });   
        
        flash()->message(trans('general.message_send'))->success()->important();
        return redirect()->back();
    }

}
