<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function add_category()
    {
        $data = Category::all();
        return view('admin-panel.settings.categories.category_list', compact('data'));
    }
    public function store_category(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',

        ], [
            'name.required' => 'Name is required',

        ]);

        $data = ['name' => $request->name];
        $data = Category::create($data);

        if ($data) {
            return redirect()->back()->with('success', "Record inserted Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not inserted...");
        }
    }

    public function edit_category($id)
    {

        $record = Category::find($id);
        $data = Category::all();

        return view('admin-panel.categories.edit_category', compact('data', 'record'));
    }
    public function update_category(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
        ]);

        $record = Category::find($id);
        $data = ['name' => $request->name];
        $data = $record->update($data);

        if ($data) {
            return redirect('add-category')->with('success', "Record Updated Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not Updated...");
        }
    }

    public function destroy_category($id)
    {
        $data = Category::find($id);
        $data = $data->delete();

        if ($data) {
            return redirect('add-category')->with('success', "Record Deleted");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted");
        }
    }

    //restoring a record
    public function restorecategory($id)
    {
        $data =  Category::withTrashed()->find($id)->restore();

        if ($data) {
            return redirect('add-category')->with('error', "Record Restored Successfully");
        } else {
            return redirect()->back()->with('success', "Record Not Restored");
        }
    }

    public function category_forceDelete($id)
    {
        $data = Category::withTrashed()->where('id', $id)->forceDelete();
        if ($data) {
            return redirect()->back()->with('error', "Record Permanently Deleted");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted...");
        }
    }

}