<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function search(Request $request){
        // Get the search value from the request
        $search = $request->input('search');
    
        // Search in the title and body columns from the posts table
        $posts = products::
            where('product_name', 'LIKE', "%{$search}%")
            ->get();
    
        // Return the search view with the resluts compacted
        return view('user.search',['posts'=>$posts]);
    }
}
