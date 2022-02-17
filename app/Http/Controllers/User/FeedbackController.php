<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('dashboard.user.feedback');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname'=>'required',
            'email'=>'required',
            'feedback_msg'=>'required'
        ]);

        $feedback =  new Feedback();
        $feedback->st_id = $request->user_id;
        $feedback->st_fullname = $request->fullname;
        $feedback->st_email = $request->email;
        $feedback->feedback = $request->feedback_msg;
        $save = $feedback->save();
        if($save){
            return back()->with('success','Thanks for Submiting your feedback!');
           
        }
    }

    public function show_feedbacks()
    {
        $feedbacks = Feedback::latest()->paginate(15);
        return view('dashboard.admin.stud-feedback',[
            'feedbacks'=>$feedbacks
        ]);
    }
}
