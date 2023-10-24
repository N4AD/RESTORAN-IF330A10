<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class CaptchaServiceController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function capthcaFormValidate(Request $request)
    {
        $request->validate([
            'captcha' => 'required|captcha'
        ],
        ['captcha.captcha'=>'Invalid captcha code.']);
        dd("You are here :) .");
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
