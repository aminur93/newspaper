<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashBoardContoller extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function getNotifyData()
    {
        $total = DB::table('news_notification')
            ->where(['news_notification.status' => 1])
            ->whereDate('news_notification.created_at', Carbon::today())
            ->get()->count();

        $post_notification = DB::table('news_posts')
            ->select(
                'news_posts.id as id',
                'news_posts.title as title',
                'news_posts.created_at as created_at',
                'news_notification.status as status',
                'news_notification.seen as seen',
                'news_notification.id as notify_id'
            )
            ->join('news_notification','news_posts.id','=','news_notification.news_post_id')
            ->whereDate('news_posts.created_at', Carbon::today())
            ->latest()
            ->get();

        return response()->json([
            'total' => $total,
            'post_notification' => $post_notification
        ],200);
    }

    public function notify($id)
    {
        DB::table('news_notification')->where('id',$id)->update([
            'status' => 0,
            'seen' => 1
        ]);

        return response()->json([
            'message' => 'Notification Seen successfully'
        ]);
    }
}
