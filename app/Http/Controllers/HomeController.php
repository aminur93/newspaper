<?php

namespace App\Http\Controllers;

use App\EmailSubscribe;
use App\NewsCategory;
use App\NewsPost;
use App\NewsSubCategory;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $category = NewsCategory::get();
        
        $sub_category = NewsSubCategory::get();
        
        $news = NewsPost::get();
        
        $news_show = NewsPost::get();
        
        $all_news = NewsPost::with('category','subCategory')->get();
        
        $main_news = NewsPost::with('category','subCategory')->get();
        
        $latest_news = NewsPost::with('category','subCategory')->latest()->get()->take(6);
        
        $popular_news = NewsPost::latest()->get()->take(5);
        
        $footer_popular = NewsPost::latest()->get()->take(3);
        
        $tags = Tag::latest()->get();
        
        $news_videos = DB::table('news_posts')
                        ->select('news_posts.*','news_post_videos.thumbnail','news_post_videos.video')
                        ->join('news_post_videos','news_posts.id','=','news_post_videos.news_id')
                        ->inRandomOrder()
                        ->first();
        
        $post_count = DB::table('news_categories')
                            ->select('news_posts.*','news_categories.category_name')
                            ->join('news_posts','news_categories.id','=','news_posts.category_id')
                            ->get();
        $category_count = [];
        $total_count = [];
        foreach ($post_count as $pc)
        {
            $category_count[$pc->category_name][] = $pc;
        }
        
        
       foreach ($category_count as $cc)
       {
           //$total_count[] = count($cc);
           foreach ($cc as $c)
           {
               $total_count[$c->category_name] = count($cc);
           }
       }
    
        Session::flush();
       
       //dd($total_count);
        
        return view('frontend.welcome',compact('category','total_count','footer_popular','main_news','news_show','news','popular_news','news_videos','all_news','sub_category','latest_news','tags'));
    }
    
    public function details($id)
    {
        $category = NewsCategory::get();
    
        $sub_category = NewsSubCategory::get();
    
        $news = NewsPost::get();
    
        $all_news = NewsPost::with('category','subCategory')->get();
        
    
        $footer_popular = NewsPost::latest()->get()->take(3);
        
    
        $post_count = DB::table('news_categories')
            ->select('news_posts.*','news_categories.category_name')
            ->join('news_posts','news_categories.id','=','news_posts.category_id')
            ->get();
        
        $category_count = [];
        $total_count = [];
        foreach ($post_count as $pc)
        {
            $category_count[$pc->category_name][] = $pc;
        }
        
        foreach ($category_count as $cc)
        {
            foreach ($cc as $c)
            {
                $total_count[$c->category_name] = count($cc);
            }
        }
        
        $news_details = NewsPost::with('category','subCategory','tag')->where('id',$id)->first();
        
        $blogkey = 'blog_' . $news_details->id;
        
        if (!Session::has($blogkey))
        {
            $news_details->increment('news_count');
            Session::put($blogkey,1);
        }
    
        //dd($total_count);
    
        return view('frontend.details',compact('category','news_details','total_count','footer_popular','main_news','news_show','news','popular_news','news_videos','all_news','sub_category','latest_news','tags'));
    }
    
    public function categoryPost($id)
    {
        $categories = NewsCategory::findOrFail($id);
    
        $category = NewsCategory::get();
    
        $sub_category = NewsSubCategory::get();
    
        $news = NewsPost::get();
    
        $news_show = NewsPost::get();
    
        $all_news = NewsPost::with('category','subCategory')->get();
        
        $popular_news = NewsPost::latest()->get()->take(5);
    
        $footer_popular = NewsPost::latest()->get()->take(3);
    
        $tags = Tag::latest()->get();
    
    
        $post_count = DB::table('news_categories')
            ->select('news_posts.*','news_categories.category_name')
            ->join('news_posts','news_categories.id','=','news_posts.category_id')
            ->get();
    
        $category_count = [];
        $total_count = [];
        foreach ($post_count as $pc)
        {
            $category_count[$pc->category_name][] = $pc;
        }
        
        foreach ($category_count as $cc)
        {
            foreach ($cc as $c)
            {
                $total_count[$c->category_name] = count($cc);
            }
        }
        
        //$category_post = NewsCategory::with('newsposts')->where('id',$id)->get()->take(12);
    
        $category_post = NewsPost::join('news_categories', 'news_posts.category_id', '=', 'news_categories.id')
                        ->where('news_categories.id', $categories->id)
                        ->selectRaw('news_posts.*')
                        ->paginate(2);
        
        //dd($category_post);
    
        return view('frontend.category_post',compact('category','categories','category_post','total_count','footer_popular','main_news','news_show','news','popular_news','news_videos','all_news','sub_category','latest_news','tags'));
    }
    
    public function tagPost($id)
    {
        $category = NewsCategory::get();
    
        $sub_category = NewsSubCategory::get();
    
        $news = NewsPost::get();
    
        $news_show = NewsPost::get();
    
        $all_news = NewsPost::with('category','subCategory')->get();
    
        $popular_news = NewsPost::latest()->get()->take(5);
    
        $footer_popular = NewsPost::latest()->get()->take(3);
    
        $tags = Tag::findOrFail($id);
        
        $tagss = Tag::latest()->get();
    
    
        $post_count = DB::table('news_categories')
            ->select('news_posts.*','news_categories.category_name')
            ->join('news_posts','news_categories.id','=','news_posts.category_id')
            ->get();
    
        $category_count = [];
        $total_count = [];
        foreach ($post_count as $pc)
        {
            $category_count[$pc->category_name][] = $pc;
        }
    
        foreach ($category_count as $cc)
        {
            foreach ($cc as $c)
            {
                $total_count[$c->category_name] = count($cc);
            }
        }
    
        //$category_post = NewsCategory::with('newsposts')->where('id',$id)->get()->take(12);
    
        $tag_post = NewsPost::join('tags', 'news_posts.tag_id', '=', 'tags.id')
            ->where('tags.id', $tags->id)
            ->selectRaw('news_posts.*')
            ->paginate(2);
    
        //dd($category_post);
    
        return view('frontend.tag_post',compact('category','tagss','categories','tag_post','total_count','footer_popular','main_news','news_show','news','popular_news','news_videos','all_news','sub_category','latest_news','tags'));
    }
    
    public function autocomplete(Request $request)
    {
        if($request->ajax()) {
            // select country name from database
            $data = NewsPost::where('title', 'LIKE', $request->search.'%')
                ->get();
            // declare an empty array for output
            $output = '';
            // if searched countries count is larager than zero
            if (count($data)>0) {
                // concatenate output to the array
                $output = '<ul class="list-group" style="display: block; position: absolute; z-index: 99;cursor: pointer">';
                // loop through the result array
                foreach ($data as $row){
                    // concatenate output to the array
                    $output .= '<li class="list-group-item">'.$row->title.'</li>';
                }
                // end of output
                $output .= '</ul>';
            }
            else {
                // if there's no matching results according to the input
                $output .= '<li class="list-group-item" style="z-index: 99;">'.'No results'.'</li>';
            }
            // return output result array
            return $output;
//            return response()->json([
//                "output" => $output
//            ]);
        }
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
    
    public function register()
    {
        return view('auth.register');
    }
    
    public function registerStore(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
    
            try{
                // Step 1 : Create Email Subscribe
                $new_user = new User();
                
                $new_user->name = $request->name;
                $new_user->email = $request->email;
                $new_user->password = bcrypt($request->password);
        
                DB::commit();
        
                return response()->json([
                    'flash_message_success' => 'New User Register Successfully'
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
