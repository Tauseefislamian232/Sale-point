<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function add_product()
    {
        $category = Category::all();
        $data = Product::with('product_with_category','product_with_subcategory')->get();
        // dd($data);
        return view('admin-panel.settings.products.product_list', compact('data', 'category'));
    }

    public function getCourse($id)
    {
        $course = Subcategory::where('cat_id', $id)->get();
        return response()->json($course);
    }

    public function store_product(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'course' => 'required',
            'is_drink' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required',
        ]);

        $product = [
            'name' => $request->name,
            'cat_id' => $request->category,
            'subcat_id' => $request->course,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'is_drink' => $request->is_drink
        ];
        $record = Product::create($product);

        if ($request->hasfile('image')) :

            $imagedata = new ProductImage();
            $file = $request->file('image');
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products/'), $imageName);

            $imagedata->product_id = $record->id;
            $imagedata->image = $imageName;
            $imagedata->save();

        endif;

        if ($imagedata) {
            return redirect()->back()->with('success', "Record inserted Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not inserted...");
        }
    }

    public function edit_product($id)
    {
        $data = Product::with('product_with_image')->find($id);
        // dd($data);
        $category = Category::all();
        // dd($category);

        return view('admin-panel.settings.products.edit_product', compact('data', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'course' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'is_drink' => 'required',
            // 'image' => 'required|image',
        ]);

        $product = Product::find($id);

        $data = [
            'name' => $request->name,
            'cat_id' => $request->category,
            'subcat_id' => $request->course,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'is_drink' => $request->is_drink
        ];

        $record = $product->update($data);

        if ($request->hasFile('image')) {

            $product_image = DB::table('product_images')->where('product_id', '=', $id)->get()->first();

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products/'), $imageName);
            $imagedata = [
                'image' => $imageName,
            ];

            $row = DB::table('product_images')->where('product_id', '=', $id)->update($imagedata);
        } else {

            unset($request->image);
        }

        return redirect('add-product')->with('success', 'Product updated successfully');
    }

    public function destroy_product($id)
    {
        $data = Product::find($id);
        $data = $data->delete();

        if ($data) {
            return redirect()->back()->with('error', "Record Deleted Successfully");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted...");
        }
    }

    //restoring a record
    public function restoreproduct($id)
    {
        $data =  Product::withTrashed()->find($id)->restore();

        if ($data) {
            return redirect('add-product')->with('success', "Record Restored Successfully");
        } else {
            return redirect()->back()->with('error', "Record Not Restored");
        }
    }
    //force Deleting a record
    public function product_forceDelete($id)
    {
        $data = Product::withTrashed()->where('id', $id)->forceDelete();
        if ($data) {
            return redirect()->back()->with('error', "Record Permanently Deleted");
        } else {
            return redirect()->back()->with('success', "Record Not Deleted...");
        }
    }
}