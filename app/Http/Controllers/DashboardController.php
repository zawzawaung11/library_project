<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       	$book= Book::orderBy('created_at','desc')->paginate(5);		
        return view('admin.dashboard',['data'=>$book]);
    }
}
