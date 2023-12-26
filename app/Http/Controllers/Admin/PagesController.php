<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\School;
use App\Models\Users;
use App\Models\Pages;

class PagesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($url) {
        $page_name = str_replace('-', ' ', $url);
        $title = ucfirst($page_name);
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        $pages = Pages::where('school_id', $school_id)->where('url', $url)->first();
        return view('pages.index', compact('school_info', 'pages', 'title', 'url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($url) {
        $page_name = str_replace('-', ' ', $url);
        $title = ucfirst($page_name);
        $user_id = Auth::user()->id;
        $school_id = Users::where('id', $user_id)->first()->school;
        $school_info = School::where('id', $school_id)->first();
        return view('pages.create', compact('school_info', 'url', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'url' => 'required',
        ]);

        Pages::create($request->all());
        return redirect()->route('pages.index', $request->url)
                        ->with('success', 'Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (isset($id) && !empty($id)) {
            $user_id = Auth::user()->id;
            $school_id = Users::where('id', $user_id)->first()->school;
            $school_info = School::where('id', $school_id)->first();
            $content = Pages::where('id', $id)->first();
            $url = $content->url;
            $page_name = str_replace('-', ' ', $content->url);
            $title = ucfirst($page_name);
            return view('pages.edit', compact('school_info', 'url', 'title', 'content'));
        } else {
            return Redirect::back()->withErrors(['msg' => 'Data Info not found']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $request->validate([
            'url' => 'required',
        ]);
        $bdirec = Pages::find($request->id);
        $bdirec->update($request->all());

        return redirect()->route('pages.index', $request->url)
                        ->with('success', 'Data update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $color = Departments::find($id);
        $color->delete();

        return redirect()->route('departments.index')
                        ->with('success', 'Daata deleteted successfully');
    }

}
