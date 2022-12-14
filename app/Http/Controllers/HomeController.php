<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
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
    
    public function index($id=null)
    {
        $products = Product::all();
        // dd($products);
        $category = Category::all();
        // dd($category);
        $records = Product::where('cat_id', $id)->get();
        // dd($records);

        // return view('admin-panel.index');
        return view('admin-panel.product_listing', compact('products', 'category', 'records'));
    }
    public function profile($id)
    {
        // dd(1);
        $data = User::find($id);
        return view('admin-panel.settings.users.profile', compact('data'));
    }

    public function settings($id=null){

        $products = Product::all();
        // dd($products);
        $category = Category::all();
        // dd($category);
        $category_record = Category::find($id);
        // dd($category_record);
        return view('admin-panel.settings.settings', compact('products', 'category','category_record'));
    }

}
