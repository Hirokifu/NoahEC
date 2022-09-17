<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_jp'=>'required',
            'category_name_cn'=>'required',
            'category_icon'=>'required',
        ],[
            'category_name_jp.required'=>'Input Category Japanese Name',
            'category_name_cn.required'=>'Input Category Chinese Name',
        ]);

        Category::insert([
            'category_name_jp' => $request->category_name_jp,
            'category_name_cn' => $request->category_name_cn,
            'category_slug_jp' => strtolower(str_replace(' ', '-',$request->category_name_jp)),
            'category_slug_cn' => str_replace(' ','-',$request->category_name_cn),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request ,$id){

        Category::findOrFail($id)->update([
            'category_name_jp' => $request->category_name_jp,
            'category_name_cn' => $request->category_name_cn,
            'category_slug_jp' => strtolower(str_replace(' ', '-',$request->category_name_jp)),
            'category_slug_cn' => str_replace(' ','-',$request->category_name_cn),
            'category_icon' => $request->category_icon,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}