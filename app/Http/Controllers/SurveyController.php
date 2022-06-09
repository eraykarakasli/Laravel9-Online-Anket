<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist = Survey::where('user_id',Auth::id())->get();
        return view('home.user_survey', ['datalist'=> $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        return view('home.user_survey_add', ['datalist'=>$datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new Survey;
        $data -> title = $request->input('title');
        $data -> keyword = $request->input('keyword');
        $data -> description = $request->input('description');
        $data -> category_id = $request->input('category_id');
        $data -> user_id = Auth::id();
        $data -> detail = $request->input('detail');
        $data -> slug = $request->input('slug');

        $data -> image = Storage::putFile('images',$request->file('image'));//file upload

        $data -> save();
        return redirect()->route('user_surveys');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey,$id)
    {
        $data=Category::find($id);
        $datalist = Category::with('children')->get();
        return view('home.user_survey_edit',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey,$id)
    {
        $data = Survey::find($id);
        $data -> title = $request->input('title');
        $data -> keyword = $request->input('keyword');
        $data -> description = $request->input('description');
        $data -> category_id = $request->input('category_id');
        $data -> user_id = Auth::id();
        $data -> detail = $request->input('detail');
        $data -> slug = $request->input('slug');
        if($request->file('image')!=null){
            $data->image =Storage::putFile('images',$request->file('image'));
        }
        $data -> save();
        return redirect()->route('user_surveys')->with('success','Survey Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey,$id)
    {
        $data = Survey::find($id);
        $data->delete();
        return redirect()->route('user_surveys');
    }
}
