<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function index()
    {
        return view('admin.class');
    }

    public function createSection(Request $request)
    {
        return view('admin.create-section',[
            'slug'  => $request->slug,
            'idSection'    => $request->id
        ]);
    }

    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ]);
        }
    
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    
        return response()->json([
            'status' => 'success',
            'url' => asset('images/' . $imageName),
        ]);
    }
}
