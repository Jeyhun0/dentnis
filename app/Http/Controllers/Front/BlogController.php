<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\articl;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\MenuBuilder;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
//        $menus = Menu::leftJoin('pages', 'menus.page_id', '=', 'pages.id')
//            ->select('menus.*', 'pages.slug') // İhtiyacınıza göre seçimleri belirleyin
//            ->get();

//        dd($menus);
////
//        $menuList = Menu::where('is_active', 1)->orderBy('order_index','asc')->get();
//

//        $menuTree = MenuBuilder::buildMenuTree($menus);
//        echo '<pre>';
//        foreach ($menuTree as $item) {
//            echo $item->title.PHP_EOL;
//            if (count($item->children) > 0) {
//                foreach ($item->children as $i) {
//                    echo '<h1>'.$i->title.'</h1>'.PHP_EOL;
//                }
//            }
//        }
//        dd($menuTree);
        $teams = Team::with('translations')->get();
        $blogs=Blog::with('translations')->limit(9)->get();
        $blogarticle=Blog::with('translations')->limit(3)->get();


        return view('Front.pages.main',compact('teams','blogs','blogarticle'));


//        return view('welcome', compact('menuTree'));
//        return view('Front.pages.main', compact('menuTree'));
//        return view('Front.pages.main');
    }

    public function singlePage()
    {
        return view('Front.pages.singlePage');
    }

    public function about()
    {

        $lang = session()->get('language', 'tr');
        $about = AboutUs::with(['translations' => function ($query) use ($lang) {
            $query->whereHas('language', function ($subquery) use ($lang) {
                $subquery->where('lang', $lang);
            });
        }])->get();
//        $images = DoctorImage::all();
        return view('Front.pages.about');
    }

    public function contact()
    {
        return view('Front.pages.contact');
    }

    public function tvPrograms()
    {
        return view('Front.pages.tv-programs');
    }

}
