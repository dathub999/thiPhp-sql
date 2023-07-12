<?php

namespace App\Http\Controllers\function;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Client\Request;

class UploadController extends Controller
{
    // function upload demo
    // public function upload(Request  $request)
    // {
    //     $file = $request->file('photo');
    //     echo '-----dui file::' . $file->getClientOriginalExtension();
    //     // upload file
    //     $request->photo->move(public_path('images'), $file->getClientOriginalName());
    //     return view('',);
    // }

    public function AddCategory(Request $request)
    {
        $data=[
            'name'=> $request->input('name'),
            'parent_id'=> $request->input('parent_id'),
            'created_at'=> $request->input('created_at'),
            'update_at'=> $request->input('update_at'),
        ];

        Category::create($data);
        return redirect('admin/category');
    }
}
