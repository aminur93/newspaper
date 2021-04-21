<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Validator;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $valid = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'subject' => 'required',
                'message_comment' => 'required|max:250'
            ]);

            if ($valid->fails())
            {
                return \response()->json([
                    'success' =>false,
                    'error' => $valid->errors(),
                    'status_code' => 422
                ],Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            DB::beginTransaction();

            try{

                //create comment

                $comment = new Comment();

                $comment->user_id = $request->user_id;
                $comment->name = $request->name;
                $comment->email = $request->email;
                $comment->phone = $request->phone;
                $comment->subject = $request->subject;
                $comment->message_comment = $request->message_comment;

                $comment->save();

                DB::commit();

                return \response()->json([
                    'success' => true,
                    'message' => 'Comment added successful',
                    'status_code' => 200
                ],Response::HTTP_OK);

            }catch (\Exception $e){
                DB::rollBack();

                $error = $e->getMessage();

                return response()->json([
                    'success' => false,
                    'error' => $error,
                    'status_code' => 500
                ],Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }

    public function getComments(Request $request)
    {

        $news_post_id = $request->news_post_id;

        $comments = Comment::where('news_post_id', $news_post_id)->get();

        if ($comments === null)
        {
            return \response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'comments' => $comments,
                'status_code' => 200
            ],Response::HTTP_OK);
        }

    }
}
