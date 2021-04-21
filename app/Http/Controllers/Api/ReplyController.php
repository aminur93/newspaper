<?php

namespace App\Http\Controllers\Api;

use App\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Validator;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $valid = Validator::make($request->all(),[
                'reply_comment' => 'required|max:250'
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

                //create reply comment

                $reply = new Reply();

                $reply->comments_id = $request->comments_id;
                $reply->user_id = $request->user_id;
                $reply->reply_comment = $request->reply_comment;

                $reply->save();

                DB::commit();

                return \response()->json([
                    'success' => true,
                    'message' => 'Reply comments added successful',
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

    public function getReply(Request $request)
    {
        $comment_id = $request->comment_id;

        $reply = Reply::where('comments_id',$comment_id)->get();

        if (is_null($reply))
        {
            return \response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'reply' => $reply,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }
}
