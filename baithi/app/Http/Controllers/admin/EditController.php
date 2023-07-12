<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Images_product;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class EditController extends Controller
{
    public function Edit_Product($id, Request $request)
    {
        $products = DB::table('products')->find($id);
        $category = DB::table('category')
            ->select('category.*')
            ->get();
        $mul_pics = DB::table('images_product')->where('product_id', $id)
            ->select('images_product.*')
            ->get();
        return view('admin/Edit/edit_product', ['products' => $products, 'categories' => $category, 'mul_pics' => $mul_pics]);
    }

    public function Update_Product(Request $request)
    {
        $photo = $request->input('current_photo');
        if ($request->hasfile('Photo')) {
            $file = $request->file('Photo');

            $request->Photo->move(public_path('user/img/product'), $file->getClientOriginalName());
            $photo = $file->getClientOriginalName();
        }

        
        $input = $request->all();
        $galary = array();
        if ($files = $request->file('galary')) {
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(public_path('user/img/product'), $name);
                $galary[] = $name;
            }
        }

        $product = [
            'name' => $request->input('Name'),
            'details' => $request->input('Description'),
            'price' => $request->input('Price'),
            'quantity' => $request->input('Quantity'),
            'categogy_id' => $request->input('Category'),
            'photo' => $photo
        ];
        $id = $request->input('id');

        foreach ($galary as $gal) {
            $images_product = [
                'photo' => $gal,
                'product_id' => $id
            ];
            Images_product::create($images_product);
        };

        Products::find($id)->update($product);
        return redirect('/admin/productlist');
    }


    public function Edit_Category($id)
    {
        $data = [
            'categorys' => Category::find($id)
        ];
        return view('admin/Edit/edit_category')->with($data);
    }

    public function Update_Category(Request $request)
    {
        $photo = $request->input('current_photo');
        if ($request->hasfile('Photo')) {
            $file = $request->file('Photo');

            $request->Photo->move(public_path('user/img/category'), $file->getClientOriginalName());
            $photo = $file->getClientOriginalName();
        }

        $category = [
            'name' => $request->input('Name'),
            'description' => $request->input('Description'),
            'photo' => $photo
        ];
        $id = $request->input('id');
        Category::find($id)->update($category);
        return redirect('/admin/category');
    }

    public function Update_Quantity(Request $request)
    {
        $quantity = $request->input('current_quantity');
        $add = $request->input('add_quantity');
        if (isset($_POST['export'])) {
            $new_quantity = $quantity - $add;
        } elseif (isset($_POST['import'])) {
            $new_quantity = $quantity + $add;
        }

        $product_quantity = [
            'quantity' => $new_quantity
        ];
        $id = $request->input('id');
        Products::find($id)->update($product_quantity);
        return redirect('admin/management');
    }
}
