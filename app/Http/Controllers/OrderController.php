<?php

namespace App\Http\Controllers;

use App\Models\PlaceOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function place_order(Request $request)
    {
        dd($request->all());
        $data = [

            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'cat_id' => $request->cat_id,
            'image_id' => $request->image_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'discount' => $request->discount,
            'net_total' => $request->net_total,
            'remaining_quantity' => $request->remaining_quantity,
            'is_drink' => $request->is_drink,

        ];
        $order = PlaceOrder::create($data);
        if ($data) {
            return redirect('view-listing')->with('success', "Your Order has been Placed! we'll contact you soon...");
        } else {
            return redirect()->back()->with('error', "Failed to Process...");
        }
    }
}