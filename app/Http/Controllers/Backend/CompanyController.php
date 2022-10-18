<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Admin;
use Carbon\Carbon;
// use Auth;
use Image;

class CompanyController extends Controller
{
    public function CompanyView(){
		$companies = Company::latest()->get();
		return view('backend.company.company_view',compact('companies'));
	}

	public function CompanyAdd(){
		// $companies = Company::latest()->get();
		return view('backend.company.company_add');
	}

    public function CompanyStore(Request $request){

        $request->validate([
            'company_jp'=>'required',
            'address_jp'=>'required',
            'business_jp'=>'required',
            'product_jp'=>'required',
            'short_descp_jp'=>'required',
            'manager'=>'required',
            'tel'=>'required',
            'email'=>'required',
            'company_thambnail'=>'required',
        ],[
            'company_jp.required'=>'Input something please',
            'address_jp.required'=>'Input something please',
            'business_jp.required'=>'Input something please',
            'product_jp.required'=>'Input something please',
            'short_descp_jp.required'=>'Input something please',
            'manager.required'=>'Input something please',
            'tel.required'=>'Input something please',
            'email.required'=>'Input something please',
            'company_thambnail.required'=>'Input something please',
        ]);

        $image = $request->file('company_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/company/thambnail/'.$name_gen);
        $save_url = $name_gen;

        Company::insert([
            'admin_id' => Admin::all()->first()->id,
			'company_jp' => $request->company_jp,
			'company_cn' => $request->company_cn,

			'address_jp' => $request->address_jp,
			'address_en' => $request->address_en,
            'post_code' => $request->post_code,

			'homepage' => $request->homepage,
			'business_jp' => $request->business_jp,
			'business_cn' => $request->business_cn,
			'product_jp' => $request->product_jp,
			'product_cn' => $request->product_cn,

			'tags_jp' => $request->tags_jp,
			'tags_cn' => $request->tags_cn,

			'short_descp_jp' => $request->short_descp_jp,
			'short_descp_cn' => $request->short_descp_cn,
			'long_descp_jp' => $request->long_descp_jp,
			'long_descp_cn' => $request->long_descp_cn,

			'manager' => $request->manager,
			'tel' => $request->tel,
			'phone' => $request->phone,
			'email' => $request->email,

			'company_thambnail' => $save_url,

			'status' => 1,
			'created_at' => Carbon::now(),
        ]);

		$notification = array(
			'message' => 'Company Inserted Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('company.view')->with($notification);
	}

	public function CompanyEdit($id){

		$company = Company::findOrFail($id);
		return view('backend.company.company_edit',compact('company'));

	}


    public function CompanyUpdate(Request $request){

		$company_id = $request->id;
		$old_img = $request->old_image;

		if ($request->file('company_thambnail')) {

			// 元のimageを削除
			unlink('upload/company/thambnail/'.$old_img);

			$image = $request->file('company_thambnail');
			$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(800,800)->save('upload/company/thambnail/'.$name_gen);
			$save_url = $name_gen;

			Company::findOrFail($company_id)->update([
				'admin_id' => Admin::all()->first()->id,
				'company_jp' => $request->company_jp,
				'company_cn' => $request->company_cn,

				'address_jp' => $request->address_jp,
				'address_en' => $request->address_en,
				'post_code' => $request->post_code,

				'homepage' => $request->homepage,
				'business_jp' => $request->business_jp,
				'business_cn' => $request->business_cn,
				'product_jp' => $request->product_jp,
				'product_cn' => $request->product_cn,

				'tags_jp' => $request->tags_jp,
				'tags_cn' => $request->tags_cn,

				'short_descp_jp' => $request->short_descp_jp,
				'short_descp_cn' => $request->short_descp_cn,
				'long_descp_jp' => $request->long_descp_jp,
				'long_descp_cn' => $request->long_descp_cn,

				'manager' => $request->manager,
				'tel' => $request->tel,
				'phone' => $request->phone,
				'email' => $request->email,

				'company_thambnail' => $save_url,

				'status' => 1,
				'created_at' => Carbon::now(),
			]);

			$notification = array(
				'message' => 'Company Updated Successfully',
				'alert-type' => 'success'
		);
			return redirect()->route('company.view')->with($notification);

		}else{

			Company::findOrFail($company_id)->update([
				'admin_id' => Admin::all()->first()->id,
				'company_jp' => $request->company_jp,
				'company_cn' => $request->company_cn,

				'address_jp' => $request->address_jp,
				'address_en' => $request->address_en,
				'post_code' => $request->post_code,

				'homepage' => $request->homepage,
				'business_jp' => $request->business_jp,
				'business_cn' => $request->business_cn,
				'product_jp' => $request->product_jp,
				'product_cn' => $request->product_cn,

				'tags_jp' => $request->tags_jp,
				'tags_cn' => $request->tags_cn,

				'short_descp_jp' => $request->short_descp_jp,
				'short_descp_cn' => $request->short_descp_cn,
				'long_descp_jp' => $request->long_descp_jp,
				'long_descp_cn' => $request->long_descp_cn,

				'manager' => $request->manager,
				'tel' => $request->tel,
				'phone' => $request->phone,
				'email' => $request->email,

				'status' => 1,
				'created_at' => Carbon::now(),
			]);

			$notification = array(
				'message' => 'Company Updated Successfully',
				'alert-type' => 'success'
		);
			return redirect()->route('company.view')->with($notification);
		}
	}


    public function CompanyDelete($id){

        $company = Company::findOrFail($id);
        $img = $company->company_thambnail;
        unlink('upload/company/thambnail/'.$img);

        Company::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Company Deleted Successfully',
            'alert-type' => 'info'
        );

		return redirect()->back()->with($notification);
    }


}
