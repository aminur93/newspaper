<?php

namespace App\Http\Controllers;

use App\EmailSubscribe;
use App\NewsCategory;
use App\NewsPost;
use App\NewsSubCategory;
use App\Tag;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $category = NewsCategory::get();
        
        $sub_category = NewsSubCategory::get();
        
        $news = NewsPost::latest()->get()->take(4);
        
        $all_news = NewsPost::with('category','subCategory')->latest()->get()->take(4);
        
        $latest_news = NewsPost::with('category','subCategory')->latest()->get()->take(6);
        
        $tags = Tag::latest()->get();
        
        //dd($all_news);
        
        return view('frontend.welcome',compact('category','news','all_news','sub_category','latest_news','tags'));
    }
    
    public function emailSubscribes(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
    
            try{
                // Step 1 : Create Email Subscribe
                $email_subcribe = new EmailSubscribe();
    
                $email_subcribe->email = $request->email;
    
                $email_subcribe->save();
        
                DB::commit();
        
                return response()->json([
                    'flash_message_success' => 'Subscribe Successfully'
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
