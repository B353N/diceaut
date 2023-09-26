<?php

namespace App\Http\Controllers;


use App\Models\Setting;
use App\Models\Menu;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Service;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Member;
use App\Models\Language;
use App\Models\Pricing;
use App\Models\PricingSetting;
use App\Models\ContactSetting;
use App\Models\Client;
use App\Models\HomeSetting;
use App\Models\AboutSetting;
use App\Models\PortfolioSetting;
use App\Models\ProjectCategory;
use App\Models\HeaderFooterSetting;
use App\Models\BlogSetting;
use View;
use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Mail;
use Validator;
use Alaouy\Youtube\Facades\Youtube;


class test extends Controller
{
    public function index()
    {
        $data['Video'] = Youtube::listChannelVideos('UCbmvWkPjSrSW_-chmUq9-Jg', 5, "date");

        return view('test', $data);
    }
}
