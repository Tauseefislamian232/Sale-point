<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ProductlistingController extends Controller
{
    public function demo_listing()
    {
        return view('admin-panel.products.demo_listing');
    }
    public function product_listing($id = NULL)
    {
        $products = Product::all();
        // dd($products);
        $category = Category::all();
        $records = Product::where('cat_id', $id)->get();
        // dd($records);
        return view('admin-panel.products.product_listing', compact('products', 'category', 'records'));
    }

    public function edit($id)
    {
        // $where = array('id' => $request->id);
        // $book  = Product::where($id)->first();
        $product = Product::findOrFail($id);
        // dd($product);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "product_id" => $product->id,
                "quantity" => 1,
                "price" => $product->price,
                "cat_id" => $product->cat_id,
                "subcat_id" => $product->subcat_id,
                "is_drink" => $product->is_drink,
                "image" => $product->image,
                "sub_total" => $product->price * $product->quantity

            ];
        }

        $cart = session()->put(
            'cart',
            $cart
        );
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        // dd($book);
        return session()->get('cart');
    }
    // public function addToCart($id)
    // {
    //     $product = Product::findOrFail($id);
    //     // dd($product);
    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             "name" => $product->name,
    //             "product_id" => $product->id,
    //             "quantity" => 1,
    //             "price" => $product->price,
    //             "cat_id" => $product->cat_id,
    //             "subcat_id" => $product->subcat_id,
    //             "is_drink" => $product->is_drink,
    //             "image" => $product->image
    //         ];
    //     }

    //     session()->put('cart', $cart);
    //     return redirect()->back()->with('success', 'Product added to cart successfully!');
    // }
    public function cart()
    {
        $products = Product::get();
        return view('admin-panel.products.cart', compact('products'));
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function place_order(Request $request)
    {
        dd($request->all());
    }
}