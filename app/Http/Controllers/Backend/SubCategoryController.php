<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_jp','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subcategory','categories'));
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_name_cn'=>'required',
            'subcategory_name_cn'=>'required',
        ],[
            'category_id.required'=>'Please Select Any Option',
            'subcategory_name_jp.required'=>'Input SubCategory English Name',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_jp' => $request->subcategory_name_jp,
            'subcategory_name_cn' => $request->subcategory_name_cn,
            'subcategory_slug_jp' => strtolower(str_replace(' ', '-',$request->subcategory_name_jp)),
            'subcategory_slug_cn' => str_replace(' ','-',$request->subcategory_name_cn),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_jp','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('subcategory','categories'));
    }

    public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_jp' => $request->subcategory_name_jp,
            'subcategory_name_cn' => $request->subcategory_name_cn,
            'subcategory_slug_jp' => strtolower(str_replace(' ', '-',$request->subcategory_name_jp)),
            'subcategory_slug_cn' => str_replace(' ','-',$request->subcategory_name_cn),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'SubCategory Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

// That for Sub->SubCategory

    public function SubSubCategoryView(){

        $categories = Category::orderBy('category_name_jp','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',compact('subsubcategory','categories'));
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_jp','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_jp','ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_name_cn'=>'required',
            'subsubcategory_name_cn'=>'required',
        ],[
            'category_id.required'=>'Please Select Any Option',
            'subsubcategory_name_jp.required'=>'Input SubSubCategory English Name',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_jp' => $request->subsubcategory_name_jp,
            'subsubcategory_name_cn' => $request->subsubcategory_name_cn,
            'subsubcategory_slug_jp' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_jp)),
            'subsubcategory_slug_cn' => str_replace(' ','-',$request->subsubcategory_name_cn),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_jp','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_jp','ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.category.sub_subcategory_edit',compact('categories','subcategories','subsubcategories'));
    }

    public function SubSubCategoryUpdate(Request $request){

        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_jp' => $request->subsubcategory_name_jp,
            'subsubcategory_name_cn' => $request->subsubcategory_name_cn,
            'subsubcategory_slug_jp' => strtolower(str_replace(' ', '-',$request->subsubcategory_name_jp)),
            'subsubcategory_slug_cn' => str_replace(' ','-',$request->subsubcategory_name_cn),
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Sub-SubCategory Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){

        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub-SubCategory Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
