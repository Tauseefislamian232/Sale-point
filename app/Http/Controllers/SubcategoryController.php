<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    // subcategory
    public function add_subcategory($id)
    {
        $data = Category::find($id);

        return view('admin-panel.settings.categories.subcategory_list', compact('data'));
    }
    public function store_subcategory(Request $request, $id = NULL)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'name' => 'required|unique:subcategories',
            'cat_id' => 'required',

        ], [
            'name.required' => 'Subcategory Name is required',
            'cat_id.required' => 'Category Name is required',

        ]);

        $data = [
            'cat_id' => $request->cat_id,
            'name' => $request->name,
        ];
        $data = Subcategory::create($data);

        if ($data) {
            return redirect()->back()->with('success', "Record inserted Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not inserted ---");
        }
    }

    public function edit_subcategory($id)
    {
        $data = Subcategory::find($id);
        // dd($data);
        $category = DB::table('categories')->pluck('name', 'id');

        return view('admin-panel.settings.categories.edit_subcategory', compact('data', 'category'));
    }
    public function update_subcategory(Request $request, $id)
    {
        // dd($request->all());
        $cat_id =  $id;
        $request->validate([
            'name' => 'required|unique:subcategories',
            'cat_id' => 'required',
        ]);

        $product = Subcategory::find($id);
        $cat_id = $product->cat_id;
        // dd($aa);
        $data = [
            'cat_id' => $request->cat_id,
            'name' => $request->name,
        ];

        $record = $product->update($data);
        if ($record) {
            return redirect()->route('fetch-subcategory', ['id' => $cat_id])->with('success', "Record Updated Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not Updated");
        }
    }

    public function destroy_subcategory($id)
    {

        $data = Subcategory::find($id);

        $data = $data->delete();
        if ($data) {
            return redirect('add-subcategory')->with('error', "Record Deleted Successfully");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted");
        }
    }

    public function fetch_subcategory($id = NULL)
    {

        $data = Category::find($id);

        return view('admin-panel.settings.categories.fetch_subcategory', compact('data'));
    }

    //catsubcat list
    public function subcat_list()
    {
        $data = Subcategory::get();
        return view('admin-panel.categories.subcat_list', compact('data'));
    }

    //restoring a record
    public function restoresubcategory($id)
    {
        $data =  Subcategory::withTrashed()->find($id)->restore();

        if ($data) {
            return redirect('add-category')->with('error', "Record Restored Successfully");
        } else {
            return redirect()->back()->with('success', "Record Not Restored");
        }
    }

    public function subcategory_forceDelete($id)
    {
        $data = Subcategory::withTrashed()->where('id', $id)->forceDelete();
        if ($data) {
            return redirect()->back()->with('error', "Record Permanently Deleted");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted...");
        }
    }
}