<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        $section = Section::where('id', 12)->first();
        // dd($section->content);
        return view('home', [
            'section' => $section,
        ]);
    }
}
