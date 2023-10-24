<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $general = General::latest('created_at')->first();
        $page_title = 'General Information';

        return view('general.index', compact('general', 'page_title'));
    }

    public function store(Request $request, $type)
    {
        if ($type === 'create') {
            $request->validate([
                'logo' => 'required'
            ]);
        }
        
        $request->validate([
            "company_name" => "required",
            "logo" => 'mimes:jpg,jpeg,png',
            "story_title" => "required",
            "story_description" => "required",
            "why_choose_us" => "required",
            "address" => "required",
            "primary_phone" => "required",
            "secondary_phone" => "required",
            "email" => "required",
            "delivery_fee" => "required"
        ]);

        $image = $request->file('logo');
        $path = 'uploads/logo/';

        if ($type === 'create') {
            General::create([
                "company_name" => $request->company_name,
                "logo" => uploadImage($image, $path),
                "story_title" => $request->story_title,
                "story_description" => $request->story_description,
                "why_choose_us" => $request->why_choose_us,
                "address" => $request->address,
                "primary_phone" => $request->primary_phone,
                "secondary_phone" => $request->secondary_phone,
                "email" => $request->email,
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "delivery_fee" =>$request->delivery_fee
            ]);
        } else {
            $general = General::latest('created_at')->first();
            if ($request->hasFile('logo')) {
                $old_path = public_path($general->logo);
            }
            $general->update([
                "company_name" => $request->company_name,
                "logo" => $request->hasFile('logo') ? uploadImage($image, $path, $old_path):$general->logo,
                "story_title" => $request->story_title,
                "story_description" => $request->story_description,
                "why_choose_us" => $request->why_choose_us,
                "address" => $request->address,
                "primary_phone" => $request->primary_phone,
                "secondary_phone" => $request->secondary_phone,
                "email" => $request->email,
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
                "delivery_fee" =>$request->delivery_fee
            ]);
        }

        return back()->with('toast_sucess', 'General Information Added');
    }
}
