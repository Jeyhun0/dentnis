<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\DoctorImage;
use App\Models\Quotes;
use App\Models\QuotesTranslation;
use App\Models\Slider;
use App\Models\Sponsors;
use App\Models\Team;
use App\Models\TeamTranslation;
use App\Models\Youtubes;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Nette\Utils\Image;
use function Symfony\Component\Translation\t;

class CategoryController extends Controller
{
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        $translations = CategoryTranslation::where('slug','name')->get();
        $category = BlogTranslation::where('blog_id', $blog->id)->get();
        return view('Front.pages.singlePage', compact('category', 'blog','translations'));
    }

    public function yourFunction()
    {
        $images = Slider::all();

        return view('Front.pages.main', compact('images'));

    }

    public function quotes()
    {

        $quotes = Quotes::all();


        $translations = QuotesTranslation::all();


        return view('Front.pages.main', ['quotes' => $quotes, 'translations' => $translations]);
    }

    public function sponsor()
    {
        $sponsors = Sponsors::all();
        return view('Front.pages.main', compact('sponsors'));
    }

    public function showVideo()
    {
        $youtubes = Youtubes::all();

        return view('Front.pages.main', compact('youtubes'));
    }

    public function teams()
    {


//        dd($teams);

        return view('Front.pages.main', compact('teams'));

    }
    public function about()
    {
        $lang = session()->get('language', 'en');
        $about = AboutUs::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();
//        $images = DoctorImage::all();
        return view('Front.pages.about', compact('about',));
    }
}
