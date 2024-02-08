<?php
use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\admin\AdminController::class,'index']);
Route::get('/Sponsor',[\App\Http\Controllers\admin\AdminController::class,'sponsor'])->name('sponsor');
Route::get('/article',[\App\Http\Controllers\admin\AdminController::class,'article'])->name('article');
Route::get('/team',[\App\Http\Controllers\admin\AdminController::class,'teams'])->name('team');
Route::get('/Add',[\App\Http\Controllers\admin\AdminController::class,'add'])->name('add');

//Route::post('/Add',function (){
//    dd();
//})->name('createadd');

Route::post('/Add',[\App\Http\Controllers\admin\AdminController::class,'createadd'])->name('createadd');
Route::get('/edit/{id}',[\App\Http\Controllers\Admin\AdminController::class,'edit'])->name('edit');
Route::post('/update/{id}',[\App\Http\Controllers\admin\AdminController::class,'update'])->name('update');
Route::get('/team/{id}', [\App\Http\Controllers\admin\AdminController::class,'destroy'])->name('delete');
Route::post('/teams',[\App\Http\Controllers\admin\AdminController::class,'teams']);
Route::get('/addspon',[\App\Http\Controllers\admin\AdminController::class,'addspon'])->name('addspon');
Route::post('/addspon',[\App\Http\Controllers\admin\AdminController::class,'creadd'])->name('addspon');
Route::get('/editspon{id}',[\App\Http\Controllers\admin\AdminController::class,'editspon'])->name('editspon');
Route::post('/sponupdate/{id}',[\App\Http\Controllers\admin\AdminController::class,'sponupdate'])->name('sponupdate');
Route::get('/sponsor/{id}', [\App\Http\Controllers\admin\AdminController::class,'spondestroy'])->name('spondelete');
Route::get('/quotes',[\App\Http\Controllers\admin\AdminController::class,'quotes'])->name('quotes');
Route::get('/quoadd',[\App\Http\Controllers\admin\AdminController::class,'quoadd'])->name('quoadd');
Route::post('/quoadd',[\App\Http\Controllers\admin\AdminController::class,'quocreadd'])->name('quocreadd');
Route::get('/quoedit/{id}', [\App\Http\Controllers\admin\AdminController::class,'quoedit'])->name('quoedit');
Route::post('/quoupdat/{id}',[\App\Http\Controllers\admin\AdminController::class,'quoupdat'])->name('quoupdat');
Route::get('/quote/{id}', [\App\Http\Controllers\admin\AdminController::class,'quotdelet'])->name('quotdelete');
Route::get('/blog', [\App\Http\Controllers\Admin\AdminController::class, 'blog'])->name('blog');
Route::get('/blogadd',[\App\Http\Controllers\admin\AdminController::class,'bloadd'])->name('blogadd');
Route::post('/blogadd',[\App\Http\Controllers\admin\AdminController::class,'blogadd'])->name('blogShowAdd');
Route::get('/blogedit/{id}', [\App\Http\Controllers\admin\AdminController::class,'blogedit'])->name('blogedit');
Route::post('/blogupdate/{id}',[\App\Http\Controllers\admin\AdminController::class,'blogupdate'])->name('blogupdate');
Route::get('/blogdelete/{id}', [\App\Http\Controllers\admin\AdminController::class,'blogdelet'])->name('blogdelete');
Route::get('/category',[\App\Http\Controllers\admin\AdminController::class,'category'])->name('category');
Route::get('/catadd',[\App\Http\Controllers\admin\AdminController::class,'cateadd'])->name('cateadd');
Route::post('/catadd',[\App\Http\Controllers\admin\AdminController::class,'catadd'])->name('catadd');
Route::get('/editcategory/{id}', [\App\Http\Controllers\admin\AdminController::class,'editCategory'])->name('editcategory');
Route::put('/updateCategory/{id}', [\App\Http\Controllers\admin\AdminController::class,'updateCategory'])->name('updateCategory');
Route::get('/category/{id}', [\App\Http\Controllers\admin\AdminController::class,'catedelet'])->name('categorydelete');
Route::get('/sliders',[\App\Http\Controllers\admin\AdminController::class,'slider'])->name('sliders');
Route::get('/addsil',[\App\Http\Controllers\admin\AdminController::class,'addsil'])->name('addsil');
Route::post('/slideradd',[\App\Http\Controllers\admin\AdminController::class,'slideradd'])->name('slideradd');
Route::get('/editslider{id}',[\App\Http\Controllers\admin\AdminController::class,'editslider'])->name('editslider');
Route::post('/sliderupdate/{id}',[\App\Http\Controllers\admin\AdminController::class,'sliderupdate'])->name('sliderupdate');
Route::get('/slider/{id}', [\App\Http\Controllers\admin\AdminController::class,'sliderdestroy'])->name('sliderdelete');
Route::get('/youtube',[\App\Http\Controllers\admin\AdminController::class,'youtube'])->name('youtube');
Route::get('/addyoutube',[\App\Http\Controllers\admin\AdminController::class,'addyoutube'])->name('addyoutube');
Route::post('/youtubeadd',[\App\Http\Controllers\admin\AdminController::class,'youtubeadd'])->name('youtubeadd');
Route::get('/edityoutube{id}',[\App\Http\Controllers\admin\AdminController::class,'edityoutube'])->name('edityoutube');
Route::put('/youtubeupdate/{id}',[\App\Http\Controllers\admin\AdminController::class,'youtubeupdate'])->name('youtubeupdate');
Route::get('/youtube/{id}', [\App\Http\Controllers\admin\AdminController::class,'youtubedestroy'])->name('youtubedelete');
Route::get('/language',[\App\Http\Controllers\admin\AdminController::class,'language'])->name('language');
Route::get('/languageadd',[\App\Http\Controllers\admin\AdminController::class,'languageadd'])->name('languageadd');
Route::post('/addlanguage',[\App\Http\Controllers\admin\AdminController::class,'addlanguage'])->name('addlanguage');
Route::get('/editlanguage{id}',[\App\Http\Controllers\admin\AdminController::class,'editlanguage'])->name('editlanguage');
Route::post('/updatelangauge/{id}',[\App\Http\Controllers\admin\AdminController::class,'updatelanguage'])->name('updatelanguage');
Route::get('/language/{id}', [\App\Http\Controllers\admin\AdminController::class,'languagedestroy'])->name('languagedelete');
Route::get('locale/{locale}', [\App\Http\Controllers\LokalController::class, 'setLocale'])->name('locale.set');
Route::get('/about',[\App\Http\Controllers\admin\AdminController::class,'about'])->name('about');
Route::get('/aboutadd',[\App\Http\Controllers\admin\AdminController::class,'aboutadd'])->name('aboutadd');
Route::post('/addabout',[\App\Http\Controllers\admin\AdminController::class,'addabout'])->name('addabout');











































