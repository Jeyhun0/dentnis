<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokalController extends Controller
{
    public function setLocale($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
