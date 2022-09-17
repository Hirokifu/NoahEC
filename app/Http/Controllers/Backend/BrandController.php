<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_jp'=>'required',
            'brand_name_cn'=>'required',
            'brand_image'=>'required',
        ],[
            'brand_name_jp.required'=>'Input Brand Japanese Name',
            'brand_name_cn.required'=>'Input Brand Chinese Name',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        Image::make($image)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_jp' => $request->brand_name_jp,
            'brand_name_cn' => $request->brand_name_cn,
            'brand_slug_jp' => strtolower(str_replace(' ', '-',$request->brand_name_jp)),
            'brand_slug_cn' => str_replace(' ','-',$request->brand_name_cn),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit',compact('brand'));
    }

    public function BrandUpdate(Request $request){

        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {

        unlink($old_img);
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        Image::make($image)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

	Brand::findOrFail($brand_id)->update([
		'brand_name_jp' => $request->brand_name_jp,
		'brand_name_cn' => $request->brand_name_cn,
		'brand_slug_jp' => strtolower(str_replace(' ', '-',$request->brand_name_jp)),
		'brand_slug_cn' => str_replace(' ', '-',$request->brand_name_cn),
		'brand_image' => $save_url,
        'updated_at' => Carbon::now(),

    ]);

    $notification = array(
        'message' => 'Brand Updated Successfully',
        'alert-type' => 'info'
    );

        return redirect()->route('all.brand')->with($notification);

    }else{

        Brand::findOrFail($brand_id)->update([
        'brand_name_jp' => $request->brand_name_jp,
        'brand_name_cn' => $request->brand_name_cn,
        'brand_slug_jp' => strtolower(str_replace(' ', '-',$request->brand_name_jp)),
        'brand_slug_cn' => str_replace(' ', '-',$request->brand_name_cn),
        'updated_at' => Carbon::now(),

    ]);

    $notification = array(
        'message' => 'Brand Updated Successfully',
        'alert-type' => 'info'
    );

		return redirect()->route('all.brand')->with($notification);

    	} // end else
    } // end method



    public function BrandDelete($id){

        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );

		return redirect()->back()->with($notification);

    }

}