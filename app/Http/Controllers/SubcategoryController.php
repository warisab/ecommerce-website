<?php

namespace App\Http\Controllers;

use App\Models\subcategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addsubcategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['category_id']=$request->category_id;
        $data['subcategory_name']=$request->subcategory_name;

        subcategory::insert($data);
        session()->put('message', 'Data added successfully');
        return redirect ('/addsubcategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function show(subcategory $subcategory)
    {
        // $subcategory = subcategory::all();
         $subcategory=subcategory::
         join( 'Categories', 'subcategories.category_id', '=', 'categories.category_id')
        ->select('subcategories.*','category_name', 'subcategory_name')
        ->get();
        return view('admin.allsubcategory', ['subcategory' => $subcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(subcategory $subcategory_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subcategory $subcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\subcategory  $subcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($subcategory_id)
    {
        subcategory::where('subcategory_id', $subcategory_id)->delete();
        return redirect('/allsubcategory');
    }
    public function showw(){
        $category=Category::all();
        return view('admin.addsubcategory', ['category' => $category]);
    }
}
