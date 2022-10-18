<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Meeting;
use App\Models\Admin;
use Carbon\Carbon;
use Auth;

class MeetingController extends Controller
{
    use MeetingZoomTrait;

    public function AdminMeetingView()
    {
        $meetings = Meeting::all();
        return view('backend.meeting.meeting_view', compact('meetings'));
    }

    public function AdminAddMeeting()
    {
        return view('backend.meeting.meeting_add');
    }

    public function AdminMeetingStore(Request $request){

            $meeting = $this->createMeeting($request);

            Meeting::insert([
                // 'user_id' => auth()->user()->id,
                'admin_id' => Admin::all()->first()->id,

                'topic' => $request->topic,
                'start_at' => $request->start_time,
                'duration' => $request->duration,

                'meeting_id' => $meeting->id,
                'password' => $meeting->password,
                'start_url' => $meeting->start_url,
                'join_url' => $meeting->join_url,
                'created_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Meeting Inserted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('all.meeting')->with($notification);
    }


    public function AdminMeetingEdit($id){
        $meeting = Meeting::findOrFail($id);
        return view('backend.meeting.meeting_edit',compact('meeting'));
    }


    public function AdminMeetingUpdate(Request $request){

        $meeting = Zoom::meeting()->find(id);

        // $meeting_id = $meeting_id->meeting_id;
        // $meeting = $this->updateMeeting($request);

        Meeting::meeting()->find(id)->update([
            'admin_id' => Admin::all()->first()->id,
            'topic' => $request->topic,
            'start_at' => $request->start_time,
            'duration' => $request->duration,

            'meeting_id' => $meeting->id,
            'password' => $meeting->password,
            'start_url' => $meeting->start_url,
            'join_url' => $meeting->join_url,

            'updated_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Meeting Updated Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('all.meeting')->with($notification);
    }


    public function AdminMeetingDelete($id)
    {
        // ZOOMサイト上の予定削除
        $meeting = Meeting::findOrFail($id);
        $zoom = Zoom::meeting()->find($meeting->meeting_id);
        $zoom->delete();

        // データベースの予定削除
        Meeting::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Meeting Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
