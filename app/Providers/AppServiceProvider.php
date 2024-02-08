<?php

namespace App\Providers;

use App\Models\AboutMenu;
use App\Models\Category;
use App\Models\Language;
use App\Models\Quotes;
use App\Models\QuotesTranslation;
use App\Models\Sponsors;
use App\Models\Team;
use App\Models\TeamTranslation;
use App\Models\Youtubes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use League\CommonMark\Extension\SmartPunct\Quote;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $lang = session()->get('language', 'tr');
        App::setLocale($lang);
        $languages = Language::pluck('lang')->toArray();
        config([
           'app.languages' => $languages,
        ]);
        view()->composer('Front.*', function ($view) {
            $lang = session()->get('language', 'en');
            App::setLocale($lang);
            $categories = Category::with(['translations', 'blogs.translations'])->get();
            $languageIcon = Language::query()->get();
            $aboutMenu = AboutMenu::with(['translations' => function ($query) use ($lang) {
                $query->whereHas('language', function ($subquery) use ($lang) {
                    $subquery->where('lang', $lang);
                });
            }])->get();

            return $view->with(compact('categories','languageIcon','aboutMenu','lang'));
        });
        view()->composer('Front.*', function ($view) {
            $quotes = Quotes::with('translations')->get();
            $translations = QuotesTranslation::with('quote')->get();

            $view->with('quotes', $quotes)->with('translations', $translations);
        });
        view()->composer('Front.*', function ($view) {
            $sponsors = Sponsors::all();

            return $view->with(compact('sponsors'));
        });
        view()->composer('Front.*', function ($view) {
            $youtubes = Youtubes::all();

            return $view->with(compact('youtubes'));

        });


    }
}
