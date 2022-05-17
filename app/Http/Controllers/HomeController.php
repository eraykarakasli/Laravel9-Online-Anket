<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;
use App\Models\Place;
use App\Models\Review;
use App\Models\Setting;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Context;

class HomeController extends Controller
{

    public static function getsetting()
    {
        return Setting::first();
    }

    public static function categorylist()
    {
        return Category::where('parent_id','=', 0)->with('children')->get();
    }

    public function index(){
        $setting =Setting::first();


        $data = [
            'setting'=>$setting
        ];
        return view('home.index',$data);
    }

    public function aboutus(){
        $setting =Setting::first();
        return view('home.about',['setting'=>$setting]);
    }

    public function references(){
        $setting =Setting::first();
        return view('home.references',['setting'=>$setting]);
    }

    public function faq(){
        $datalist=Faq::all()->sortBy('position');
        return view('home.faq',['datalist'=>$datalist]);
    }


    public function contact(){
        $setting =Setting::first();
        return view('home.contact',['setting'=>$setting]);
    }

    public function login()
    {
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        if($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');


            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('admin');
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
        else{
            return view('admin.login');
        }
    }
    public function logout(Request  $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }


}
