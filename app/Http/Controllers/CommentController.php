<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use DB;
use auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
    
            try{
                // Step 1 : Create Email Subscribe
                $user_comment = new Comment();
    
                $user_comment->name = $request->name;
                $user_comment->email = $request->email;
                $user_comment->user_id = auth::user()->id;
                $user_comment->news_post_id = $request->news_post_id;
                $user_comment->message_comment = $request->message_comment;
    
                $user_comment->save();
        
                DB::commit();
        
                return response()->json([
                    'flash_message_success' => 'Post Comments Add Successfully'
                ],200);
        
            }catch(\Illuminate\Database\QueryException $e){
                DB::rollback();
        
                $error = $e->getMessage();
        
                return response()->json([
                    'error' => $error
                ],200);
            }
        }
    }
}
