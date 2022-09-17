<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\BlogPostCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Image;

class BlogController extends Controller
{
    public function BlogCategory(){
        $blogcategory = BlogPostCategory::latest()->get();
        return view('backend.blog.category.category_view',compact('blogcategory'));
    }

    public function BlogCategoryStore(Request $request){

        $request->validate([
            'blog_category_name_jp' => 'required',
            'blog_category_name_cn' => 'required',
        ],[
            'blog_category_name_jp.required' => 'Input Blog Category JP Name',
            'blog_category_name_cn.required' => 'Input Blog Category CN Name',
        ]);

        BlogPostCategory::insert([
            'blog_category_name_jp' => $request->blog_category_name_jp,
            'blog_category_name_cn' => $request->blog_category_name_cn,
            'blog_category_slug_jp' => strtolower(str_replace(' ', '-',$request->blog_category_name_jp)),
            'blog_category_slug_cn' => str_replace(' ', '-',$request->blog_category_name_cn),
            'created_at' => Carbon::now(),
            ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


    public function BlogCategoryEdit($id){
        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blogcategory'));
    }


    public function BlogCategoryUpdate(Request $request){

        $blogcar_id = $request->id;
        BlogPostCategory::findOrFail($blogcar_id)->update([
            'blog_category_name_jp' => $request->blog_category_name_jp,
            'blog_category_name_cn' => $request->blog_category_name_cn,
            'blog_category_slug_jp' => strtolower(str_replace(' ', '-',$request->blog_category_name_jp)),
            'blog_category_slug_cn' => str_replace(' ', '-',$request->blog_category_name_cn),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('blog.category')->with($notification);
    }


    public function BlogCategoryDelete($id){

        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'PostCategory Deleted Successfully',
            'alert-type' => 'info'
        );

		return redirect()->back()->with($notification);

    }




    public function ListBlogPost(){
        $blogpost = BlogPost::with('category')->latest()->get();
        return view('backend.blog.post.post_list',compact('blogpost'));
    }

    public function AddBlogPost(){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_add',compact('blogpost','blogcategory'));
    }

    public function BlogPostStore(Request $request){

        $request->validate([
                'post_title_jp' => 'required',
                'post_title_cn' => 'required',
                'post_image' => 'required',
            ],[
                'post_title_jp.required' => 'Input Post Title Japanese Name',
                'post_title_cn.required' => 'Input Post Title Chinese Name',
            ]);

            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
            // Image::make($image)->save('upload/post/'.$name_gen);
            $save_url = 'upload/post/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_jp' => $request->post_title_jp,
            'post_title_cn' => $request->post_title_cn,
            'post_slug_jp' => strtolower(str_replace(' ', '-',$request->post_title_jp)),
            'post_slug_cn' => str_replace(' ', '-',$request->post_title_cn),
            'post_image' => $save_url,
            'post_details_jp' => $request->post_details_jp,
            'post_details_cn' => $request->post_details_cn,
            'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Blog Post Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('list.post')->with($notification);
    }


    public function BlogPostEdit($id){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::findOrFail($id);
        return view('backend.blog.post.post_edit',compact('blogpost','blogcategory'));
    }

    public function BlogPostUpdate(Request $request){

        $blogpost_id = $request->id;

        // old_imageはedit.blade.phpにて指定する必要ある
        $old_img = $request->old_image;

        if ($request->file('post_image')) {

        // 元のimageを削除
        unlink($old_img);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        // Image::make($image)->save('upload/post/'.$name_gen);
        Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
        $save_url = 'upload/post/'.$name_gen;

        BlogPost::findOrFail($blogpost_id)->update([
            'post_title_jp' => $request->post_title_jp,
            'post_title_cn' => $request->post_title_cn,
            'post_slug_jp' => strtolower(str_replace(' ', '-',$request->post_title_jp)),
            'post_slug_cn' => str_replace(' ', '-',$request->post_title_cn),
            'post_image' => $save_url,
            'post_details_jp' => $request->post_details_jp,
            'post_details_cn' => $request->post_details_cn,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('list.post')->with($notification);

    }else{

        BlogPost::findOrFail($blogpost_id)->update([
            'post_title_jp' => $request->post_title_jp,
            'post_title_cn' => $request->post_title_cn,
            'post_slug_jp' => strtolower(str_replace(' ', '-',$request->post_title_jp)),
            'post_slug_cn' => str_replace(' ', '-',$request->post_title_cn),
            'post_details_jp' => $request->post_details_jp,
            'post_details_cn' => $request->post_details_cn,
            'updated_at' => Carbon::now(),
    ]);
        $notification = array(
            'message' => 'Blog Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('list.post')->with($notification);
    }
    }


    public function BlogPostDelete($id){

        $post = BlogPost::findOrFail($id);
        $img = $post->post_image;

        if ($img) {
            unlink($img);
        };

        // コメント機能ある場合、コメントも削除

        BlogPost::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully',
            'alert-type' => 'info'
        );

		return redirect()->back()->with($notification);

    }

}