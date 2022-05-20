<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\Image;
use App\Models\Message;

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
        $slider= Survey::select('id','title','image','slug')->limit(6)->get();


        $data = [
            'setting'=>$setting,
            'slider'=>$slider,

        ];
        return view('home.index',$data);
    }
    public function survey($id){
        $data=Survey::find($id);
        print_r($data);
        exit();
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

    public function sendmessage(Request $request){
        $data= new Message();
        $data -> name = $request->input('name');
        $data -> email = $request->input('email');
        $data -> phone = $request->input('phone');
        $data -> subject = $request->input('subject');
        $data -> message = $request->input('message');
        $data -> save();
        return redirect()->route('contact')->with('success','Mesajınız Kaydedilmiştir, Teşekkürler.');

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
