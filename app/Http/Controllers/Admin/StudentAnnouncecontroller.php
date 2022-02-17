<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Announcement;


class StudentAnnouncecontroller extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $announce = Announcement::latest()->paginate(10);
        return view('dashboard.admin.announcement',[
            'courses'=>$courses,
            'announce'=>$announce
        ]);
    }

    public function saveAnnounce(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'msg'=>'required',
            'course'=>'required',
            'payment'=>'required'
            
        ]);

        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->body = $request->msg;
        $announcement->course_id = $request->course;
        $announcement->payment_status = $request->payment;

        $save = $announcement->save();
        if($save){
            return back()->with('success','Announcement Sent!');
           
        }
    }

    public function delete($id)
    {
        $delete = Announcement::find($id)->delete();
        if($delete){
            return back()->with('delete','Announcement has been Deleted!.');
           }
    }
}
