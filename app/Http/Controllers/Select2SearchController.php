<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class Select2SearchController extends Controller
{
    public function index()
    {
    	return view('home');
    }
    public function selectSearch(Request $request)
    {

        // dd($request->all());
        // dd($request->all());
    	// $movies = [];
        // if($request->has('q')){
        //     $search = $request->q;
            $movies =Movie::select("id", "name")
            		->where('name', 'LIKE', "%{$request->name}%")
            		->get();

                    // dd($movies);

        // }
        return response()->json($movies);
    }
   
}
