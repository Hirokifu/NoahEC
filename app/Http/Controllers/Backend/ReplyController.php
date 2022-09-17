<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Inquiry;
use App\Models\Reply;
use App\Models\User;
use App\Models\Admin;
use App\Models\News;
use Image;
use Auth;

class ReplyController extends Controller
{

	//お問合せ＆回答のビュー
    public function InquiryView() {

		$admin = Admin::all()->first();

		// お問合せ＆回答
		$inquiries = Inquiry::latest()->get();
		$replies = Reply::latest()->get();

        // お知らせ
        $news = News::latest()->get();

        return view('backend.contact.inquiry_view', compact('admin','inquiries','replies','news'));
    }

	//ユーザがAdminへ回答する
    public function InquiryReply(Request $request) {

        $inputs = $request->validate([
			'body' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg|max:1024',
		]);

			$reply = new Reply();
			$reply->body = $inputs['body'];
			$reply->user_id = Auth::user()->id;
			$reply->inquiry_id = $request->inquiry_id;
			$reply->created_at = Carbon::now();

		if ($files = $request->file('image')) {
			$destinationPath = 'upload/inquiry'; // upload path
			$digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath,$digitalItem);
			$reply->image = $digitalItem;
		}

		$reply->save();

		$notification = array(
			'message' => 'Replied Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('inquiry')->with($notification);
    }

	// Adminはお問合せへの回答をする
    public function InquiryReplyAdmin(Request $request) {

        $inputs = $request->validate([
			'body' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg|max:1024',
		]);

		$reply = new Reply();
		$reply->body = $inputs['body'];
		$reply->admin_id = Admin::all()->first()->id;
		$reply->inquiry_id = $request->inquiry_id;
		$reply->created_at = Carbon::now();

		if ($files = $request->file('image')) {
			$destinationPath = 'upload/inquiry'; // upload path
			$digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath,$digitalItem);
			$reply->image = $digitalItem;
		}

		$reply->save();

		$notification = array(
			'message' => 'Replied Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }

	// Adminはお問合せへの回答を削除する
	public function ReplyAdminDelete($id){

		$reply = Reply::findOrFail($id);

		if($reply->image) {
			$old_image = $reply->image;

			// 注意：base_pathを削除すると元の写真は削除できるようになった
			// unlink(base_path('upload/inquiry/'.$old_image));
			unlink('upload/inquiry/'.$old_image);
		}

        Reply::findOrFail($id)->delete();
            $notification = array(
            'message' => 'Reply Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
	}


	//Adminはニュースを発行する
	public function NewsStore(Request $request) {

        $inputs = $request->validate([
			'title' => 'required',
			'body' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg|max:1024',
		]);

		$news = new News();
		$news->title = $inputs['title'];
		$news->body = $inputs['body'];
		$news->created_at = Carbon::now();

		if ($files = $request->file('image')) {
			$destinationPath = 'upload/news'; // upload path
			$digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
			$files->move($destinationPath,$digitalItem);
			$news->image = $digitalItem;
		}

		$news->save();

		$notification = array(
			'message' => 'News released Successfully',
			'alert-type' => 'success'
		);

		return view('backend.news.news')->with($notification);
    }


	//Adminはニュースを編集する
	public function NewsEdit($id){
        $news = News::findOrFail($id);
        return view('backend.news.news_edit',compact('news'));
    }

	public function NewsUpdate(Request $request) {

		$news_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {

        unlink($old_img);

		$image = $request->file('image');
        $name_gen = date('YmdHis').'.'.$image->getClientOriginalExtension();
        Image::make($image)->save('upload/news/'.$name_gen);
        $save_url = $name_gen;


		// $destinationPath = 'upload/news';
		// $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
		// $files->move($destinationPath,$digitalItem);
		// $news->image = $digitalItem;

	News::findOrFail($news_id)->update([
		'title' => $request->title,
		'body' => $request->body,
		'image' => $save_url,
        'updated_at' => Carbon::now(),
    ]);

		$notification = array(
			'message' => 'News Updated Successfully',
			'alert-type' => 'success'
		);
		return redirect()->route('admin.news')->with($notification);
    }else{
        News::findOrFail($news_id)->update([
		'title' => $request->title,
		'body' => $request->body,
        'updated_at' => Carbon::now(),
    ]);

		$notification = array(
			'message' => 'News Updated Successfully',
			'alert-type' => 'info'
		);
			return redirect()->route('admin.news')->with($notification);
		}
    }


}
