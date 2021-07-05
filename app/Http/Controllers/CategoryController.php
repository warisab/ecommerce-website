<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.addcategory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data ['category_name'] = $request->category_name;
        $data ['category_description'] = $request->category_description;

        Category::insert($data);
        session()->put('message', 'Data added Successfully');
        return redirect ('/add-category');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::all();
        return view('admin.allcategory', ['category'=> $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
         $category = Category::where('category_id', $category_id)->first();
         return view('admin.edit_category', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $data=array();
        $data['category_name']=$request->category_name;       
        $data['category_description']=$request->category_description;

        Category::where('category_id' ,$category_id)->update($data);
        session()->put('message', 'Data update Successfully');
        return view ('admin.dashboard' ,['category_id' => $category_id]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        Category::where('category_id', $category_id)->delete();
        return view('admin.dashboard');
    }
}
