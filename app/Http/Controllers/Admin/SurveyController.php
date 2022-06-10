<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
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
        $datalist = Survey::all();
        return view('admin.survey', ['datalist'=> $datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
       return view('admin.survey_add', ['datalist'=>$datalist]);
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
        $data -> status = $request->input('status');
        $data -> image = Storage::putFile('images',$request->file('image'));//file upload

        $data -> save();
        return redirect()->route('admin_surveys');
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
        $data=Survey::find($id);
        $datalist = Category::with('children')->get();
        return view('admin.survey_edit',['data'=>$data,'datalist'=>$datalist]);
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
        $data-> image = Storage::putFile('images', $request->file('image'));
        $data -> save();
        return redirect()->route('admin_surveys');
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
        return redirect()->route('admin_surveys');
    }
}
