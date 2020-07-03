<?php

namespace App\Http\Controllers\Admin;

use App\EmailSubscribe;
use App\Jobs\SendEmailSubscriberJob;
use App\Mail\SendEmailSubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Mail;

class EmailSubscribeController extends Controller
{
    public function index()
    {
        return view('admin.email_subscribe.index');
    }
    
    public function create()
    {
        $email_subscribe = EmailSubscribe::get();
        return view('admin.email_subscribe.create',compact('email_subscribe'));
    }
    
    public function getData()
    {
        $email_subscribe = EmailSubscribe::get();
        
        return DataTables::of($email_subscribe)
            ->addIndexColumn()
            ->editColumn('action', function ($email_subscribe) {
                $return = "<div class=\"btn-group\">";
                if (!empty($email_subscribe->email))
                {
                    $return .= "
                              <a rel=\"$email_subscribe->id\" rel1=\"delete-email_subscribe\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
                                  ";
                }
                $return .= "</div>";
                return $return;
            })
            ->rawColumns([
                'action'
            ])
            ->make(true);
    }
    
    public function send(Request $request)
    {
        $data = array(
            //'to_email' => $request->to_email,
            'from_email' => $request->from_email,
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message
        );
    
        Mail::to($request->to_email)->queue(new SendEmailSubscriber($data));
    
        //dispatch(new SendEmailSubscriberJob($data));
        
        return redirect()->back()->with('flash_message_success','Email Has Been sent');
    }
}
