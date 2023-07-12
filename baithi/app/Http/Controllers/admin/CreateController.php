<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function AddProduct()
    {
        $category = DB::table('category')
            ->select('category.*')
            ->get();
        return view('Admin/Create/createProduct', ['categories' => $category]);
    }

    public function Save_Product(Request $request)
    {   
        

        if ($request->hasfile('Photo')) {
            $file = $request->file('Photo');

            $request->Photo->move(public_path('user/img/product'), $file->getClientOriginalName());
            $photo = $file->getClientOriginalName();
        }

        $product = [
            'name' => $request->input('Name'),
            'details' => $request->input('Description'),
            'price' => $request->input('Price'),
            'quantity' => $request->input('Quantity'),
            'categogy_id' => $request->input('Category'),
            'photo' => $photo
        ];


        Products::create($product);
        return redirect('/admin/productlist');
    }


    public function AddCategory()
    {

        return view('Admin/Create/createCategory');
    }

    public function Save_Category(Request $request)
    {
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
        Category::create($category);
        return redirect('/admin/category');
    }

}
