<?php

namespace App\Http\Controllers;

use App\Models\brands;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.addbrand');
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
        $data['brand_name']=$request->brand_name;

        brands::insert($data);
        session()->put('message', 'Data added Successfully');
        return redirect ('/add-brand');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show(brands $brands)
    {
        $brand = brands::all();
        return view('admin.allbrand',['brand'=>$brand]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit($brand_id)
    {
        $brand = brands::where('brand_id', $brand_id)->first();
        return view('admin.editbrand', ['brand'=>$brand]);

       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$brand_id)
    {
        $data=array();
        $data['brand_name']=$request->brand_name;

        $brand = brands::where('brand_id', $brand_id)->update($data);
        session()->put('message', 'Data added Successfully');
        return view('admin.dashboard',['brand' => $brand]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($brand_id)
    {
        brands::where('brand_id',$brand_id)->delete();
        session()->put('message', 'Data added Successfully');
        return redirect ('/all-brand');
    }
}
