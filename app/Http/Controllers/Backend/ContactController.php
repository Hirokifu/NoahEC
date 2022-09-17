<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Contact;

class ContactController extends Controller
{
    public function ContactForm(){
        return view('frontend.contact.contact');
    }

    public function ContactStore(Request $request){
        $request->validate([
            'email'=>'required',
            'body'=>'required',
        ],[
            'email.required'=>'Input Email please',
            'body.required'=>'Input Your Request please',
        ]);

        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'title' => $request->title,
            'body' => $request->body,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Your message sent Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function ContactView(){
        $contacts = Contact::latest()->get();
        return view('backend.contact.contact_view',compact('contacts'));
    }

    public function ContactDelete($id){

        $contact = Contact::findOrFail($id);

        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Contact Deleted Successfully',
            'alert-type' => 'info'
        );

		return redirect()->back()->with($notification);

    } // end method


    public function ContactInactive($id){
        Contact::findOrFail($id)->update(['status' => 0]);

        $notification = array(
			'message' => 'Contact Inactive Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method


    public function ContactActive($id){
        Contact::findOrFail($id)->update(['status' => 1]);

        $notification = array(
			'message' => 'Contact Active Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    } // end method


}
