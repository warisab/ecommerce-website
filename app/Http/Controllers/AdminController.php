<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {

        return view('admin.adminlogin');
    }
    public function check(Request $request)
    {
        
        $userinfo = Admin::where([
             'Username' => $request->Username,
             'password' => $request->Password,
        ])->first();

       if($userinfo)
       {
       $request->session()->put('admin_id', $userinfo->admin_id);
            return redirect('/dashboard');

       }
       else{
        return back()->with('fail', 'Incorrect Email or Password');
        
       return redirect('/admin');
        
    }

    
}


public function logout(Request $request){
    
  $request->session()->flush();
        return redirect('/admin');
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
}
