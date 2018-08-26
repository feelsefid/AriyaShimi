<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ArticleCategory;
use App\Models\Deg360;
use App\Models\Setting;
use App\Models\SlideShow;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;
use Mailgun\Mailgun;

class AboutController extends Controller
{
    public function index()
    {
        $data = ArticleCategory::with('articles')->where('module', 'about')->first();
        $consent = ArticleCategory::with('articles')->where('module', 'consent')->first();
        $title="درباره ما";
        return view('site.about.index', compact('data', 'consent','title'));
    }

}
