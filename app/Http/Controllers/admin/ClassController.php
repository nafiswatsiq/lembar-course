<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin.class');
    }

    public function createSection(Request $request)
    {
        return view('admin.create-section',[
            'slug' => $request->slug,
        ]);
    }
}
