<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;


class AdminUserController extends Controller
{
    public function AllAdminRole(){

        // type=2にして管理者を分類する
        $adminuser = Admin::where('type',2)->latest()->get();
        return view('backend.role.admin_role_all',compact('adminuser'));

    }

    public function AddAdminRole(){
        return view('backend.role.admin_role_create');
    }

    public function StoreAdminRole(Request $request){

        $image = $request->file('profile_photo_path');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/admin_images'),$name_gen);
        $save_url = $name_gen;

	Admin::insert([
		'name' => $request->name,
		'email' => $request->email,
		'password' => Hash::make($request->password),
		'phone' => $request->phone,
		'brand' => $request->brand,
		'category' => $request->category,
		'product' => $request->product,
		'slider' => $request->slider,
		'coupons' => $request->coupons,

		'shipping' => $request->shipping,
		'blog' => $request->blog,
		'setting' => $request->setting,
		'returnorder' => $request->returnorder,
		'review' => $request->review,

		'orders' => $request->orders,
		'stock' => $request->stock,
		'reports' => $request->reports,
		'alluser' => $request->alluser,
		'adminuserrole' => $request->adminuserrole,
        'contact' => $request->contact,
        'inquiry' => $request->inquiry,
        'faq' => $request->faq,
        'news' => $request->news,
        'meeting' => $request->meeting,
        'company' => $request->company,

		'type' => 2,
		'profile_photo_path' => $save_url,
		'created_at' => Carbon::now(),
        ]);

        $notification = array(
			'message' => 'Admin User Created Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.admin.user')->with($notification);

    }

    public function EditAdminRole($id){

        $adminuser = Admin::findOrFail($id);
        return view('backend.role.admin_role_edit',compact('adminuser'));

    } // end method

    public function UpdateAdminRole(Request $request){

        $admin_id = $request->id;

        if ($request->file('profile_photo_path')) {
        $image = $request->file('profile_photo_path');

        // 元のimageを削除
        unlink('upload/admin_images/'.$admin_id->profile_photo_path);

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(225,225)->save('upload/admin_images/'.$name_gen);
        $save_url = $name_gen;

        Admin::findOrFail($admin_id)->update([
            'name' => $request->name,
            'email' => $request->email,

            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,

            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'returnorder' => $request->returnorder,
            'review' => $request->review,

            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'contact' => $request->contact,
            'inquiry' => $request->inquiry,
            'faq' => $request->faq,
            'news' => $request->news,
            'meeting' => $request->meeting,
            'company' => $request->company,

            'type' => 2,
            'profile_photo_path' => $save_url,
            'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.admin.user')->with($notification);

            }else{

            Admin::findOrFail($admin_id)->update([
            'name' => $request->name,
            'email' => $request->email,

            'phone' => $request->phone,
            'brand' => $request->brand,
            'category' => $request->category,
            'product' => $request->product,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'blog' => $request->blog,
            'setting' => $request->setting,
            'returnorder' => $request->returnorder,
            'review' => $request->review,
            'orders' => $request->orders,
            'stock' => $request->stock,
            'reports' => $request->reports,
            'alluser' => $request->alluser,
            'adminuserrole' => $request->adminuserrole,
            'contact' => $request->contact,
            'inquiry' => $request->inquiry,
            'faq' => $request->faq,
            'news' => $request->news,
            'meeting' => $request->meeting,
            'company' => $request->company,

            'type' => 2,
            'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.admin.user')->with($notification);
        }
    }

    public function DeleteAdminRole($id){

        $adminimg = Admin::findOrFail($id);
        $img = $adminimg->profile_photo_path;

        unlink('upload/admin_images/'.$img);

        Admin::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Admin User Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


}
