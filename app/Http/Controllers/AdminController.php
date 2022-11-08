<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function add_admin()
    {

        $data = Admin::all();
        // $payment = Admin::find(1);
        // $month = $payment->created_at->format('F');
        // dd($month);
        // $month = date('d/m/Y', strtotime($payment->created_at));
        // dd($month);
        return view('admin-panel.settings.admins.user_list', compact('data'));
    }
    public function store_admin(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:4',
            'email' => 'required|email|unique:users'
        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);

        $data = new Admin();

        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/admins/', $filename);
            $data->avatar = $filename;
        }

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->phone = $request->phone;
        $data->is_admin = $request->is_admin;
        $data->save();

        if ($data) {
            return redirect()->back()->with('success', "Record inserted Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not inserted...");
        }
    }

    public function edit_admin($id)
    {

        // dd($id);
        $data = Admin::find($id);
        // dd($data);
        return view('admin-panel.admins.edit_admin', compact('data'));
    }

    public function update_admin(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Admin::find($id);
        // dd($product);
        $data = [
            'name' => $request->name,
            'is_admin' => $request->is_admin,
            'email' => $request->email,
            'phone' => $request->phone,
        ];
    

        if ($request->hasFile('avatar')) {

            $imageName = time() . '.' . $request->image->extension();
            $request->avatar->move(public_path('uploads/admins/'), $imageName);

            $data = ['image' => $imageName];
       
        } else {

            unset($request->image);
        }

         $data = $product->update($data);
        // dd($data);

        if ($data) {

            return redirect('add-admin')->with('success', "Record Updated Successfully");
        } 
        else 
        {
            return redirect()->back()->with('error', "Record Not Updated...");
        }
       
    }


    public function destroy_admin($id)
    {

        $data = Admin::find($id);
        dd($data);
        $data = $data->delete();

        if ($data) {
            return redirect()->back()->with('error', "Record Deleted Successfully");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted...");
        }
    }
}