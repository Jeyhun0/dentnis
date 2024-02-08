<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\AboutUsTranslation;
use App\Models\articl;
use App\Models\Blog;
use App\Models\BlogTranslation;
use App\Models\Category;
use App\Models\CategoryTranslation;
use App\Models\Language;
use App\Models\Quotes;
use App\Models\QuotesTranslation;
use App\Models\Slider;
use App\Models\Sponsors;
use App\Models\Team;
use App\Models\TeamTranslation;
use App\Models\Youtubes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }

    public function sponsor()
    {
        $sponsors = Sponsors::query()->get();
        return view('admin.page.sponsor.Sponsor', compact('sponsors'));
    }


    public function article()
    {
        $articles = articl::query()->get();
        return view('admin.page.article', compact('articles'));
    }

    public function teams()
    {


        $teams = Team::with('translations')->get();

        $languages = Language::query()->get();


        return view('admin.page.team.team', compact('teams', 'languages'));

    }

    public function add()
    {
        return view('admin.page.team.add');
    }

    public function createadd(Request $request)
    {

        $defaultLanguage = config('app.locale');
        $request->validate([
            "$defaultLanguage.position" => 'required|string',
            'image' => 'required',
            'firstName' => 'required',
        ]);
//        dd($request->all());
        $team = new Team();

//        $lang = $request->input('lang');
        $team->image = $request->file('image')->store('team_image', 'public');
        $team->title = $request->input("firstName");


//        dd($team);


        $team->save();
        $languages = config('app.languages');


        foreach ($languages as $lang) {

//          dd($lang);
            $language = Language::where('lang', $lang)->first();
//            dd($language);
            $lanId = $language->id;

            TeamTranslation::create([

                'teams_id' => $team->id,
                'position' => $request->input($lang)['position'] ?? '',
                'language_id' => $lanId
            ]);

        }


        return redirect()->route('add');


    }

    public function edit($id)
    {

        $team = Team::find($id);


        $teamTranslations = TeamTranslation::where('teams_id', $id)->get();


        return view('admin.page.team.edit', compact('team', 'teamTranslations'));
    }

    public function update(Request $request, $id)
    {
        $defaultLanguage = config('app.locale');
        $request->validate([
            "$defaultLanguage.position" => 'required|string',
//            'image' => 'required',
            'firstName' => 'required',
        ]);
        $team = Team::find($id);
        $team->title = $request->input("firstName");
//        dd($request->all());
        if ($request->hasFile('image')) {
            // Dosyanın tam yolunu ve ismini al
            $imagePath = $request->file('image')->storeAs('team_image', $request->file('image')->getClientOriginalName(), 'public');
            $team->image = $imagePath;
        }

        $team->save();


        $languages = config('app.languages');

        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $lanId = $language->id;

            $teamTranslation = TeamTranslation::updateOrCreate(
                ['teams_id' => $team->id, 'language_id' => $lanId],
                ['position' => $request->input($lang)['position'] ?? '']
            );
        }

        return redirect()->route('team', ['id' => $id]);
    }


    public function destroy($id)
    {
        // Find the team member by ID
        $team = Team::find($id);

        if (!$team) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $team->delete();

        // Delete related translations
        TeamTranslation::where('teams_id', $id)->delete();

        return redirect()->route('team')->with('success', 'Team member deleted successfully');
    }

    public function addspon()
    {
        return view('admin.page.sponsor.creadd');
    }

    public function creadd(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sponsor = new Sponsors();


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('sponsor_image', 'public');
            $sponsor->image = $imagePath;

        }


        $sponsor->save();


        return redirect()->route('sponsor')->with('success', 'Sponsor başarıyla eklendi');
    }

    public function editspon($id)
    {

        $sponsors = Sponsors::find($id);


        return view('admin.page.sponsor.editsponsor', compact('sponsors'));
    }

    public function sponupdate(Request $request, $id)
    {

        $request->validate([
            'image' => 'required',
        ]);
        $sponsor = Sponsors::find($id);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('sponsor_image', $request->file('image')->getClientOriginalName(), 'public');
            $sponsor->image = $imagePath;
        }

        $sponsor->save();


        return redirect()->route('sponsor', ['id' => $id]);
    }

    public function spondestroy($id)
    {
        // Find the team member by ID
        $sposors = Sponsors::find($id);

        if (!$sposors) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $sposors->delete();


        return redirect()->route('sponsor')->with('success', 'Team member deleted successfully');
    }

    public function quotes()
    {


        $quote = Quotes::with('translations')->get();

        $translations = QuotesTranslation::with('quote')->get();


        $languages = Language::query()->get();


        return view('admin.page.quotes.quotes', compact('quote', 'languages', 'translations'));

    }

    public function quoadd()
    {
        return view('admin.page.quotes.quotesadd');
    }

    public function quocreadd(Request $request)
    {

//        dd($request->all());

        $defaultLanguage = config('app.locale');
        $request->validate([
            "$defaultLanguage.description" => 'required',
            'image' => 'required',
            "$defaultLanguage.title" => 'required',
        ]);
//        dd($request->all());
        $quote = new Quotes();

//        $lang = $request->input('lang');
        $quote->image = $request->file('image')->store('quote_image', 'public');
//        $quote->title = $request->input("firstName");


//        dd($team);


        $quote->save();
        $languages = config('app.languages');


        foreach ($languages as $lang) {

//          dd($lang);
            $language = Language::where('lang', $lang)->first();
//            dd($language);
            $lanId = $language->id;

            QuotesTranslation::create([
                'title' => $request->input("$lang.title") ?? '',
                'quote_id' => $quote->id,
                'description' => $request->input("$lang.description") ?? '',
                'language_id' => $lanId

            ]);
        }

        return redirect()->route('quotes');


    }

    public function quoedit($id)
    {
        $quote = Quotes::find($id);
//        $language = Language::query()->get();
        $translations = QuotesTranslation::where('quote_id', $id)->get();

        return view('admin.page.quotes.quoedit', compact('quote', 'translations'));
    }

    public function quoupdat(Request $request, $id)
    {
        $defaultLanguage = config('app.locale');
        $request->validate([
            "$defaultLanguage.description" => 'required',
            'image' => 'required',
            "$defaultLanguage.title" => 'required',
        ]);

        $quote = new Quotes();
        $quote->image = $request->file('image')->store('quote_image', 'public');
        $quote->save();

        $languages = config('app.languages');

        foreach ($languages as $lang) {
            $language = Language::where('lang', $lang)->first();
            $lanId = $language->id;

            QuotesTranslation::create([
                'title' => $request->input("$lang.title") ?? '',
                'quote_id' => $quote->id,
                'description' => $request->input("$lang.description") ?? '',
                'language_id' => $lanId
            ]);
        }

        return redirect()->route('quotes', ['id' => $id]);
    }

    public function quotdelet($id)
    {
        // Find the team member by ID
        $quotes = Quotes::find($id);

        if (!$quotes) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $quotes->delete();


        return redirect()->route('quotes')->with('success', 'Team member deleted successfully');
    }

    public function blog()
    {

        $blogs = Blog::with('translations', 'languages', 'categories')->get();

//        dd($blogs[0]->category_id);

        $languages = Language::query()->get();
        return view('admin.page.blok.blok', compact('blogs', 'languages'));
    }

    public function bloadd()
    {

        $categories = Category::query()->get();
        $languages = Language::query()->get();
        $translation = BlogTranslation::query()->get();

        return view('admin.page.blok.blokadd', compact('categories', 'languages', 'translation'));
    }

    public function blogadd(Request $request)
    {
        $defaultLanguage = config('app.locale');
        $request->validate([
            "$defaultLanguage.title" => 'required|string|max:255',
            "$defaultLanguage.description" => 'required|string',
            'image' => 'required|image',
            'Slug' => 'required|string',
        ]);
        $defaultTitle = $request->input("$defaultLanguage.title");
        $defaultDescription = $request->input("$defaultLanguage.description");

        $blog = new Blog();
        $blog->category_id = $request->input('category_id');
        if ($request->hasFile('image')) {
            $imagePath = Storage::disk('public')->putFile("blogs", $request->file('image'));
            $blog->image = $imagePath;
        }
        $blog->slug = $request->input('Slug');
        $blog->save();

        $defaultLanguageModel = Language::where('lang', $defaultLanguage)->first();
        $defaultLangId = $defaultLanguageModel->id;
        BlogTranslation::create([
            'blog_id' => $blog->id,
            'language_id' => $defaultLangId,
            'title' => $defaultTitle,
            'description' => $defaultDescription,
        ]);
        foreach (config('app.languages') as $lang) {
            if ($lang != $defaultLanguage) {
                $title = $request->input("$lang.title");
                $description = $request->input("$lang.description");

                if (!empty($title) || !empty($description)) {
                    $request->validate([
                        "$lang.title" => 'string|max:255',
                        "$lang.description" => 'string',
                    ]);

                    $languageModel = Language::where('lang', $lang)->first();
                    $langId = $languageModel->id;

                    BlogTranslation::create([
                        'blog_id' => $blog->id,
                        'language_id' => $langId,
                        'title' => $title,
                        'description' => $description,
                    ]);
                }
            }
        }

        return redirect()->route('blog')->with('success', 'Blog created successfully');


    }

    public function blogedit($id)
    {
        $blog = Blog::find($id);
        $languages = Language::all();
        $translations = BlogTranslation::where('blog_id', $id)->get();
        $categories = Category::query()->get();

        return view('admin.page.blok.blokedit', compact('blog', 'translations', 'categories', 'languages'));
    }

    public function blogupdate(Request $request, $id)
    {
        $defaultLanguage = config('app.locale');

        $request->validate([
            "$defaultLanguage.title" => 'required|string|max:255',
            "$defaultLanguage.description" => 'required|string',
            'itemImg' => 'nullable|image',
            'itemSlug' => 'required|string',
        ]);

        $blog = Blog::findOrFail($id);
        $blog->category_id = $request->input('category_id');
        if ($request->hasFile('itemImg')) {
            if ($blog->image) {
                Storage::delete($blog->image);
            }
            $imagePath = Storage::disk('public')->putFile("blogs", $request->file('itemImg'));
            $blog->image = $imagePath;
        }

        $blog->slug = $request->input('itemSlug');
        $blog->save();

        $defaultLanguageModel = Language::where('lang', $defaultLanguage)->firstOrFail();
        $defaultLangId = $defaultLanguageModel->id;
        $title = $request->input("$defaultLanguage.title");
        $description = $request->input("$defaultLanguage.description");
        $blogTranslation = BlogTranslation::updateOrCreate(
            ['blog_id' => $blog->id, 'language_id' => $defaultLangId],
            ['title' => $title, 'description' => $description]
        );

        foreach (config('app.languages') as $lang) {
            if ($lang != $defaultLanguage) {
                $title = $request->input("$lang.title");
                $description = $request->input("$lang.description");

                if (!empty($title) || !empty($description)) {
                    $languageModel = Language::where('lang', $lang)->firstOrFail();
                    $langId = $languageModel->id;

                    BlogTranslation::updateOrCreate(
                        ['blog_id' => $blog->id, 'language_id' => $langId],
                        ['title' => $title, 'description' => $description]
                    );
                } else {
                    $languageModel = Language::where('lang', $lang)->firstOrFail();

                    $langId = $languageModel->id;

                    BlogTranslation::where('blog_id', $blog->id)
                        ->where('language_id', $langId)
                        ->delete();
                }
            }
        }

        return redirect()->route('blog')->with('success', 'Blog updated successfully');
    }

    public function blogdelet($id)
    {
        // Find the team member by ID
        $blog = Blog::find($id);

        if (!$blog) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $blog->delete();


        return redirect()->route('blog')->with('success', 'Team member deleted successfully');
    }


    public function category()
    {
        $adminCategories = Category::with('translations', 'blogs')->get();

        $languages = Language::query()->get();
        $translations = CategoryTranslation::query()->get();


        return view('Admin.page.category.category', compact('adminCategories', 'languages'));
    }

    public function cateadd()
    {

        return view('Admin.page.category.cateadd');
    }

    public function catadd(Request $request)
    {

//        dd($request->all());
        $category = new Category();

//        $lang = $request->input('lang');


//        dd($team);


        $category->save();
        $languages = config('app.languages');


        foreach ($languages as $lang) {

//          dd($lang);
            $language = Language::where('lang', $lang)->first();
//            dd($language);
            $lanId = $language->id;

            CategoryTranslation::create([

                'category_id' => $category->id,
                'slug' => $request->input($lang)['slug'] ?? '',
                'name' => $request->input($lang)['name'] ?? '',
                'language_id' => $lanId
            ]);


        }

        return redirect()->route('category')->with('success', 'Blog created successfully');


    }

    public function editCategory($id)
    {

        $category = Category::findOrFail($id);
        $translations = $category->translations;

        return view('admin.page.category.cateedit', compact('category', 'translations'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        // Validate the incoming request data
        $validatedData = $request->validate([

             'name' => 'required|max:255',
             'slug' => 'required|unique:category_translations,slug,'.$id,
        ]);

        // Update the category's translations
        foreach ($category->translations as $translation) {
            $translation->update([
                'name' => $validatedData[$translation->language->lang]['name'],
                'slug' => $validatedData[$translation->language->lang]['slug'],
            ]);
        }

        return redirect()->route('category')->with('success', 'Category updated successfully');
    }

    public function catedelet($id)
    {
        // Find the team member by ID
        $category = Category::find($id);

        if (!$category) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $category->delete();


        return redirect()->route('category')->with('success', 'Team member deleted successfully');
    }

    public function slider()

    {
        $sliders = Slider::all();
        return view('admin.page.Sliders.Slider', compact('sliders'));
    }

    public function addsil()

    {

        return view('admin.page.Sliders.slideradd');
    }


    public function slideradd(Request $request)
    {

        $request->validate([
            'image' => 'required|image',
        ]);

        $sliders = new Slider();


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider_image', 'public');
            $sliders->image = $imagePath;

        }


        $sliders->save();


        return redirect()->route('sliders')->with('success', 'Slider başarıyla eklendi');
    }

//
    public function editslider($id)
    {

        $sliders = Slider::find($id);


        return view('admin.page.Sliders.slideredit', compact('sliders'));
    }

    public function sliderupdate(Request $request, $id)
    {

        $request->validate([
            'image' => 'required',
        ]);
        $slider = Slider::find($id);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('slider_image', $request->file('image')->getClientOriginalName(), 'public');
            $slider->image = $imagePath;
        }

        $slider->save();


        return redirect()->route('sliders', ['id' => $id]);
    }

    public function sliderdestroy($id)
    {
        // Find the team member by ID
        $sliders = Slider::find($id);

        if (!$sliders) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $sliders->delete();


        return redirect()->route('sliders')->with('success', 'Team member deleted successfully');
    }

    public function youtube()

    {
        $youtubes = Youtubes::all();
        return view('admin.page.youtube.youtube', compact('youtubes'));

    }


    public function addyoutube()

    {
        $youtubes = Youtubes::all();
        return view('admin.page.youtube.youtubeadd', compact('youtubes'));

    }

    public function youtubeadd(Request $request)
    {

        $request->validate([
            'url' => 'required|url',
        ]);

        $youtube = new Youtubes();

        $youtube->url = $request->input('url');

        $youtube->save();


        return redirect()->route('youtube')->with('success', 'Slider başarıyla eklendi');
    }

    public function edityoutube($id)
    {

        $youtube = Youtubes::find($id);


        return view('admin.page.youtube.youtubeedit', compact('youtube'));
    }

    public function youtubeupdate(Request $request, $id)
    {

        $request->validate([
            'url' => 'required|url',
        ]);

        $youtube = new Youtubes();

        $youtube->url = $request->input('url');

        $youtube->save();

        return redirect()->route('youtube')->with('success', 'YouTube video successfully updated.');
    }

    public function youtubedestroy($id)
    {
        // Find the team member by ID
        $youtube = Youtubes::find($id);

        if (!$youtube) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $youtube->delete();


        return redirect()->route('youtube')->with('success', 'Team member deleted successfully');
    }

    public function language()

    {
        $languages = Language::all();
        return view('admin.language.language', compact('languages'));

    }

    public function languageadd()
    {
        return view('admin.language.languageadd');
    }

    public function addlanguage(Request $request)
    {

        $request->validate([
            'lang' => 'required|string|max:255',
            'image' => 'required'
        ]);
//dd($request->all(all));
        $languages = new Language();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('language_image', 'public');
            $languages->image = $imagePath;

        }
        $languages->lang = $request->input('lang');

        $languages->save();

        return redirect()->route('language')->with('success', 'Dil başarıyla eklendi.');
    }

    public function editlanguage(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        return view('admin.language.languageedit', compact('language'));
    }

    public function updatelanguage(Request $request, $id)
    {
        $request->validate([
            'lang' => 'required|string|max:255',
            'image' => 'nullable|image|',
        ]);

        $language = Language::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('language_image', 'public');
            $language->image = $imagePath;

            $language->lang = $request->input('lang');
            $language->save();


        }

        return redirect()->route('language')->with('success', 'Dil başarıyla güncellendi.');


    }

    public function languagedestroy($id)
    {
        // Find the team member by ID
        $language = Language::find($id);

        if (!$language) {

            return redirect()->back()->with('error', 'Team member not found');
        }


        $language->delete();


        return redirect()->route('language')->with('success', 'Team member deleted successfully');
    }

    public function about()
    {
        $abouts = AboutUs::with('translations')->get();


        $rowCount = AboutUs::count();

//        dd($abouts);
        return view('Admin.about.about', compact('abouts', 'rowCount'));
    }

    public function aboutadd()
    {
        return view('Admin.about.aboutadd');
    }


    public function addabout(Request $request)
    {
        $defaultLanguage = config('app.locale');
        $request->validate([

            "$defaultLanguage.description" => 'required|string',

        ]);

        $defaultDescription = $request->input("$defaultLanguage.description");

        $about = new AboutUs();
        $about->about->id = $request->input('about_us_id');

        $about->save();

        $defaultLanguageModel = Language::where('lang', $defaultLanguage)->first();
        $defaultLangId = $defaultLanguageModel->id;
        AboutUsTranslation::create([
            'about_us_id' => $about->id,
            'language_id' => $defaultLangId,
            'description' => $defaultDescription,
        ]);
        foreach (config('app.languages') as $lang) {
            if ($lang != $defaultLanguage) {

                $description = $request->input("$lang.description");

                if (!empty($title) || !empty($description)) {
                    $request->validate([

                        "$lang.description" => 'string',
                    ]);
                    $languageModel = Language::where('lang', $lang)->first();
                    $langId = $languageModel->id;

                    AboutUsTranslation::create([
                        'about_us_id' => $about->id,
                        'language_id' => $langId,

                        'description' => $description,
                    ]);
                }
            }
        }

        return redirect()->route('about')->with('success', 'Blog created successfully');


    }
}









