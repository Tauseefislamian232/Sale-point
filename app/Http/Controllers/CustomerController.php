<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;

class CustomerController extends Controller
{
    public function add_customer()
    {
        $data = Customer::all();

        return view('admin-panel.customers.create_customer', compact('data'));
    }
    public function store_customer(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'is_drink' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ], [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'phone.required' => 'Phone Number is required',
            'address.required' => 'Address field is required',
            'is_drink.required' => 'Order type is required',

        ]);

        $data  = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_drink' => $request->is_drink,
        ];

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/customers/'), $imageName);
            $data['image'] = $imageName;
        }

        $data = Customer::create($data);
        // dd($data);

        if ($data) {
            return redirect()->back()->with('success', "Record inserted Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not inserted ---");
        }
    }
    public function edit_customer($id)
    {
        // dd($id);
        $data = Customer::find($id);
        // dd($data);
        return view('admin-panel.customers.edit_customer', compact('data'));
    }
    public function update_customer(Request $request, $id)
    {
        
       

        $product = Customer::find($id);
        // dd($product);
         $validatedData = $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'is_drink' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ], [
            'name.required' => 'Name field is required',
            'email.required' => 'Email field is required',
            'phone.required' => 'Phone Number is required',
            'address.required' => 'Address field is required',
            'is_drink.required' => 'Order type is required',

        ]);

        $data  = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'is_drink' => $request->is_drink,
        ];

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/customers/'), $imageName);
            $data['image'] = $imageName;
        }

        else {

            unset($request->image);
        }

         $data = $product->update($data);
        // dd($data);

        if ($data) {

            return redirect('add-customer')->with('success', "Record Updated Successfully");
        } 
        else 
        {
            return redirect()->back()->with('error', "Record Not Updated...");
        }

    }
    public function destroy_customer($id)
    {

        $data = Customer::find($id);
        // dd($data);
        $data = $data->delete();

        if ($data) {
            return redirect()->back()->with('error', "Record Deleted Successfully");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted...");
        }
    }
}