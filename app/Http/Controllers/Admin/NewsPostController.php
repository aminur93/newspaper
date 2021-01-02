<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Divison;
use App\NewsCategory;
use App\NewsPost;
use App\NewsPostVideo;
use App\NewsSubCategory;
use App\Tag;
use App\Types;
use App\UpZilla;
use App\Zilla;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Input;

class NewsPostController extends Controller
{
    public function index()
    {
        $total = DB::table('news_notification')->whereDate('created_at', Carbon::today())->get()->count();

        $post_notification = DB::table('news_posts')
            ->select(
                'news_posts.id as id',
                'news_posts.title as title',
                'news_posts.created_at as created_at',
                'news_notification.status as status',
                'news_notification.seen as seen'
            )
            ->join('news_notification','news_posts.id','=','news_notification.news_post_id')
            ->whereDate('news_posts.created_at', Carbon::today())
            ->latest()
            ->get();

        return view('admin.news.index', compact('post_notification','total'));
    }
    
    public function create()
    {
        $types = Types::get();
        $categories = NewsCategory::get();
        $tags = Tag::get();
        return view('admin.news.create',compact('types','categories','tags'));
    }
    
    public function get_country()
    {
        if (isset($_POST['types_id']))
        {
            $types_id = $_POST['types_id'];
    
            $option = '';
    
            $query = DB::table('types')
                ->select(
                    'types.id',
                    'countries.country_name as cname',
                    'countries.id as cid'
                )
                ->join('countries','types.id','=','countries.types_id')
                ->where('types.id',$types_id)
                ->get();
            //dd($query);
    
            $option .= "<option value=''>Select Country</option>";
    
            foreach ($query as $value) {
        
                $id = $value->cid;
        
                $country_name = $value->cname;
        
                $option .= " <option value=" . $id . ">" . $country_name . "</option>";
        
                //$show = array("id"=>$id, "subject_name"=>$subject_name);
            }
    
            echo $option;
        }
    }
    
    public function get_division()
    {
        if (isset($_POST['country_id']))
        {
            $country_id = $_POST['country_id'];
        
            $option = '';
        
            $query = DB::table('countries')
                ->select(
                    'countries.id',
                    'divisons.division_name as dname',
                    'divisons.id as did'
                )
                ->join('divisons','countries.id','=','divisons.country_id')
                ->where('countries.id',$country_id)
                ->get();
            //dd($query);
        
            $option .= "<option value=''>Select Division</option>";
        
            foreach ($query as $value) {
            
                $id = $value->did;
            
                $country_name = $value->dname;
            
                $option .= " <option value=" . $id . ">" . $country_name . "</option>";
            
                //$show = array("id"=>$id, "subject_name"=>$subject_name);
            }
        
            echo $option;
        }
    }
    
    public function get_zilla()
    {
        if (isset($_POST['division_id']))
        {
            $division_id = $_POST['division_id'];
        
            $option = '';
        
            $query = DB::table('divisons')
                ->select(
                    'divisons.id',
                    'zillas.zilla_name as zname',
                    'zillas.id as zid'
                )
                ->join('zillas','divisons.id','=','zillas.division_id')
                ->where('divisons.id',$division_id)
                ->get();
            //dd($query);
        
            $option .= "<option value=''>Select Zilla</option>";
        
            foreach ($query as $value) {
            
                $id = $value->zid;
            
                $country_name = $value->zname;
            
                $option .= " <option value=" . $id . ">" . $country_name . "</option>";
            
                //$show = array("id"=>$id, "subject_name"=>$subject_name);
            }
        
            echo $option;
        }
    }
    
    public function get_upzilla()
    {
        if (isset($_POST['zilla_id']))
        {
            $zilla_id = $_POST['zilla_id'];
        
            $option = '';
        
            $query = DB::table('zillas')
                ->select(
                    'zillas.id',
                    'up_zillas.upzilla_name as uname',
                    'up_zillas.id as uid'
                )
                ->join('up_zillas','zillas.id','=','up_zillas.zilla_id')
                ->where('zillas.id',$zilla_id)
                ->get();
            //dd($query);
        
            $option .= "<option value=''>Select UpZilla</option>";
        
            foreach ($query as $value) {
            
                $id = $value->uid;
            
                $country_name = $value->uname;
            
                $option .= " <option value=" . $id . ">" . $country_name . "</option>";
            
                //$show = array("id"=>$id, "subject_name"=>$subject_name);
            }
        
            echo $option;
        }
    }
    
    public function get_subcategory()
    {
        if (isset($_POST['category_id']))
        {
            $category_id = $_POST['category_id'];
        
            $option = '';
        
            $query = DB::table('news_categories')
                ->select(
                    'news_categories.id',
                    'news_sub_categories.sub_category_name as subname',
                    'news_sub_categories.id as subid'
                )
                ->join('news_sub_categories','news_categories.id','=','news_sub_categories.category_id')
                ->where('news_categories.id',$category_id)
                ->get();
            //dd($query);
        
            $option .= "<option value=''>Select Sub Category</option>";
        
            foreach ($query as $value) {
            
                $id = $value->subid;
            
                $country_name = $value->subname;
            
                $option .= " <option value=" . $id . ">" . $country_name . "</option>";
            
                //$show = array("id"=>$id, "subject_name"=>$subject_name);
            }
        
            echo $option;
        }
    }
    
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
//            DB::beginTransaction();
//
//            try{
                if($request->hasFile('image')){
        
                    $image_tmp = $request->file('image');
                    if($image_tmp->isValid()){
                        $extenson = $image_tmp->getClientOriginalExtension();
                        $filename = rand(111,99999).'.'.$extenson;
            
                        $original_image_path = public_path().'/assets/admin/uploads/news_original_image/'.$filename;
                        $large_image_path = public_path().'/assets/admin/uploads/news_large/'.$filename;
                        $medium_image_path = public_path().'/assets/admin/uploads/news_medium/'.$filename;
                        $submedium_image_path = public_path().'/assets/admin/uploads/news_sub_medium/'.$filename;
                        $small_image_path = public_path().'/assets/admin/uploads/News_small/'.$filename;
            
                        //Resize Image
                        Image::make($image_tmp)->save($original_image_path);
                        Image::make($image_tmp)->resize(1920,680)->save($large_image_path);
                        Image::make($image_tmp)->resize(1000,529)->save($medium_image_path);
                        Image::make($image_tmp)->resize(720,540)->save($submedium_image_path);
                        Image::make($image_tmp)->resize(100,75)->save($small_image_path);
                        
                    }
                }
                
                // Step 1 : Create News Post
                $news_post = new NewsPost();
        
                $news_post->category_id = $request->category_id;
                $news_post->sub_cat_id = $request->sub_cat_id;
                $news_post->tag_id = $request->tag_id;
                $news_post->headline = $request->headline;
                $news_post->title = $request->title;
                $news_post->description = $request->description;
                $news_post->author = $request->author;
                $news_post->date = $request->date;
                $news_post->news_count = 0;
                $news_post->image = $filename;
                
                
                if (!empty($request->status))
                {
                    $news_post->status = 1;
                }else{
                    $news_post->status = 0;
                }
    
                if (!empty($request->publish))
                {
                    $news_post->publish = 1;
                }else{
                    $news_post->publish = 0;
                }
    
                if (!empty($request->feature))
                {
                    $news_post->feature = 1;
                }else{
                    $news_post->feature = 0;
                }
        
                $news_post->save();
                
                $news_id = DB::getPdo()->lastInsertId();
                
                DB::table('news_address')->insert([
                    'news_id' => $news_id,
                    'types_id' => $request->types_id,
                    'country_id' => $request->country_id,
                    'division_id' => $request->division_id,
                    'zilla_id' => $request->zilla_id,
                    'upzilla_id' => $request->upzilla_id
                ]);

                DB::table('news_notification')->insert([
                    'news_post_id' => $news_id,
                    'status' => 1,
                    'seen' => 0,
                    'created_at' => Carbon::today(),
                    'updated_at' => Carbon::today()
                ]);
        
                //DB::commit();
        
                return response()->json([
                    'flash_message_success' => 'News Post Added Successfully'
                ],200);
        
//            }catch(\Illuminate\Database\QueryException $e){
//                DB::rollback();
//
//                $error = $e->getMessage();
//
//                return response()->json([
//                    'error' => $error
//                ],200);
//            }
        }
    }
    
    public function getData()
    {
        $news = DB::table('news_posts')
                    ->select(
                        'news_posts.id as id',
                        'types.name as tname',
                        'news_categories.category_name as cname',
                        'news_sub_categories.sub_category_name as subname',
                        'tags.tah_name as tname',
                        'news_posts.headline as headline',
                        'news_posts.title as title',
                        'news_posts.author as author',
                        'news_posts.date as date',
                        'news_posts.image as image',
                        'news_posts.status as status',
                        'news_posts.publish as publish',
                        'news_posts.feature as feature'
                    )
                    ->join('news_address','news_posts.id','=','news_address.news_id')
                    ->join('types','news_address.types_id','=','types.id')
                    ->join('countries','news_address.country_id','=','countries.id')
                    ->join('divisons','news_address.division_id','=','divisons.id')
                    ->join('zillas','news_address.zilla_id','=','zillas.id')
                    ->join('up_zillas','news_address.upzilla_id','=','up_zillas.id')
                    ->join('news_categories','news_posts.category_id','=','news_categories.id')
                    ->join('news_sub_categories','news_posts.sub_cat_id','=','news_sub_categories.id')
                    ->join('tags','news_posts.tag_id','=','tags.id')
                    ->get();
        //dd($news);
        
        return DataTables::of($news)
            ->addIndexColumn()
            ->addColumn('image',function ($news){
                if ($news->image)
                {
                    $url=asset("assets/admin/uploads/News_small/$news->image");
                    return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                }

            })
            ->addColumn('status',function ($news){
                if($news->status == 0)
                {
                    return '<span class="badge badge-primary">Pending</span>';
                }else{
                    return '<span class="badge badge-danger">Approve</span>';
                }
            })
            ->addColumn('publish',function ($news){
                if($news->publish == 0)
                {
                    return '<span class="badge badge-primary">Not Publish</span>';
                }else{
                    return '<span class="badge badge-danger"> Publish</span>';
                }
            })
            ->addColumn('feature',function ($news){
                if($news->feature == 0)
                {
                    return '<span class="badge badge-primary">Not feature</span>';
                }else{
                    return '<span class="badge badge-danger"> feature</span>';
                }
            })
            ->editColumn('action', function ($news) {
                $return = "<div class=\"btn-group\">";
                if (!empty($news->headline))
                {
                    $return .= "
                            <a href=\"/news/edit/$news->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$news->id\" rel1=\"destroy-news\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
                              ||
                              <a rel2=\"$news->id\" rel3=\"approve-news\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-primary approve \"><i class='fa fa-check'></i></a>
                              ||
                              <a rel4=\"$news->id\" rel5=\"publish-news\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-success publish \"><i class='fa fa-newspaper'></i></a>
                              ||
                              <a rel6=\"$news->id\" rel7=\"feature-news\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-secondary feature \"><i class='fa fa-star'></i></a>
                              ||
                              <a  href=\"/news/view/$news->id\" style='margin-right: 5px' class=\"btn btn-sm btn-info \"><i class='fa fa-eye'></i></a>
                              ||
                              <a  href=\"/news/video/$news->id\" style='margin-right: 5px' class=\"btn btn-sm btn-dark \"><i class='fa fa-video'></i></a>
                                  ";
                }
                $return .= "</div>";
                return $return;
            })
            ->rawColumns([
                'image','status','publish','feature','action'
            ])
            ->make(true);
    }
    
    public function edit($id)
    {
        $types = Types::get();
        $divisions = Divison::get();
        $zilla = Zilla::get();
        $country = Country::get();
        $upzilla = UpZilla::get();
        $categories = NewsCategory::get();
        $sub_categories = NewsSubCategory::get();
        $tags = Tag::get();
        $news = DB::table('news_posts')
                ->select(
                    'news_posts.id',
                    'news_address.types_id',
                    'news_address.country_id',
                    'news_address.division_id',
                    'news_address.zilla_id',
                    'news_address.upzilla_id',
                    'news_posts.category_id',
                    'news_posts.sub_cat_id',
                    'news_posts.tag_id',
                    'news_posts.headline',
                    'news_posts.title',
                    'news_posts.description',
                    'news_posts.author',
                    'news_posts.date',
                    'news_posts.image',
                    'news_posts.status',
                    'news_posts.publish',
                    'news_posts.feature'
                )
            ->join('news_address','news_posts.id','=','news_address.news_id')
            ->where('news_posts.id',$id)
            ->first();
        //dd($news);
        return view('admin.news.edit',compact('types','sub_categories','categories','tags','news','divisions','zilla','upzilla','country'));
    }
    
    public function view($id)
    {
        $types = Types::get();
        $divisions = Divison::get();
        $zilla = Zilla::get();
        $country = Country::get();
        $upzilla = UpZilla::get();
        $categories = NewsCategory::get();
        $sub_categories = NewsSubCategory::get();
        $tags = Tag::get();
        $news = DB::table('news_posts')
            ->select(
                'news_posts.id',
                'news_address.types_id',
                'news_address.country_id',
                'news_address.division_id',
                'news_address.zilla_id',
                'news_address.upzilla_id',
                'news_posts.category_id',
                'news_posts.sub_cat_id',
                'news_posts.tag_id',
                'news_posts.headline',
                'news_posts.title',
                'news_posts.description',
                'news_posts.author',
                'news_posts.date',
                'news_posts.image',
                'news_posts.status',
                'news_posts.publish',
                'news_posts.feature'
            )
            ->join('news_address','news_posts.id','=','news_address.news_id')
            ->where('news_posts.id',$id)
            ->first();
        //dd($news);
        return view('admin.news.view',compact('types','sub_categories','categories','tags','news','divisions','zilla','upzilla','country'));
    }
    
    public function delete_image($id)
    {
        $news = NewsPost::where('id',$id)->first();
        
        $original_path = public_path().'/assets/admin/uploads/news_original_image/'.$news->image;
        $large_path = public_path().'/assets/admin/uploads/news_large/'.$news->image;
        $medium_path = public_path().'/assets/admin/uploads/news_medium/'.$news->image;
        $small_path = public_path().'/assets/admin/uploads/news_small/'.$news->image;
        $sub_medium_path = public_path().'/assets/admin/uploads/news_sub_medium/'.$news->image;
        
        if ($news->image)
        {
            unlink($original_path);
            unlink($large_path);
            unlink($medium_path);
            unlink($small_path);
            unlink($sub_medium_path);
        }
        
        $news->update(['image'=>null]);
    
        return response()->json([
            'flash_message_success' => 'News Post Image Deleted Successfully'
        ],200);
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
//            DB::beginTransaction();
//
//            try{
            if($request->hasFile('image')){
            
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extenson = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extenson;
                
                    $original_image_path = public_path().'/assets/admin/uploads/news_original_image/'.$filename;
                    $large_image_path = public_path().'/assets/admin/uploads/news_large/'.$filename;
                    $medium_image_path = public_path().'/assets/admin/uploads/news_medium/'.$filename;
                    $submedium_image_path = public_path().'/assets/admin/uploads/news_sub_medium/'.$filename;
                    $small_image_path = public_path().'/assets/admin/uploads/News_small/'.$filename;
                
                    //Resize Image
                    Image::make($image_tmp)->save($original_image_path);
                    Image::make($image_tmp)->resize(1920,680)->save($large_image_path);
                    Image::make($image_tmp)->resize(1000,529)->save($medium_image_path);
                    Image::make($image_tmp)->resize(720,540)->save($submedium_image_path);
                    Image::make($image_tmp)->resize(100,75)->save($small_image_path);
                
                    //store product image in data table
                    
                }
            }
        
            // Step 1 : Create News Post
            $news_post = NewsPost::findOrFail($id);
        
            $news_post->category_id = $request->category_id;
            $news_post->sub_cat_id = $request->sub_cat_id;
            $news_post->tag_id = $request->tag_id;
            $news_post->headline = $request->headline;
            $news_post->title = $request->title;
            $news_post->description = $request->description;
            $news_post->author = $request->author;
            $news_post->date = $request->date;
            $news_post->news_count = 0;
            $news_post->image = $filename;
        
        
            if (!empty($request->status))
            {
                $news_post->status = 1;
            }else{
                $news_post->status = 0;
            }
        
            if (!empty($request->publish))
            {
                $news_post->publish = 1;
            }else{
                $news_post->publish = 0;
            }
        
            if (!empty($request->feature))
            {
                $news_post->feature = 1;
            }else{
                $news_post->feature = 0;
            }
        
            $news_post->save();
        
            $news_id = DB::getPdo()->lastInsertId();
        
            DB::table('news_address')->where('news_id',$id)->update([
                'news_id' => $news_id,
                'types_id' => $request->types_id,
                'country_id' => $request->country_id,
                'division_id' => $request->division_id,
                'zilla_id' => $request->zilla_id,
                'upzilla_id' => $request->upzilla_id
            ]);
        
            //DB::commit();
        
            return response()->json([
                'flash_message_success' => 'News Post Updated Successfully'
            ],200);

//            }catch(\Illuminate\Database\QueryException $e){
//                DB::rollback();
//
//                $error = $e->getMessage();
//
//                return response()->json([
//                    'error' => $error
//                ],200);
//            }
        }
    }
    
    public function destroy($id)
    {
        $news = NewsPost::findOrFail($id);
        
        DB::table('news_address')->where('news_id',$news->id)->delete();
    
        $original_path = public_path().'/assets/admin/uploads/news_original_image/'.$news->image;
        $large_path = public_path().'/assets/admin/uploads/news_large/'.$news->image;
        $medium_path = public_path().'/assets/admin/uploads/news_medium/'.$news->image;
        $small_path = public_path().'/assets/admin/uploads/news_small/'.$news->image;
        $sub_medium_path = public_path().'/assets/admin/uploads/news_sub_medium/'.$news->image;
    
        if ($news->image)
        {
            unlink($original_path);
            unlink($large_path);
            unlink($medium_path);
            unlink($small_path);
            unlink($sub_medium_path);
        }
        
        $news->delete();
    
        return response()->json([
            'flash_message_success' => 'News Post Deleted Successfully'
        ],200);
    }
    
    public function approve($id)
    {
        NewsPost::where('id',$id)->update(['status'=>1]);
    
        return response()->json([
            'flash_message_success' => 'News Post Approve Successfully'
        ],200);
    }
    
    public function publish($id)
    {
        NewsPost::where('id',$id)->update(['publish'=>1]);
    
        return response()->json([
            'flash_message_success' => 'News Post Publish Successfully'
        ],200);
    }
    
    public function feature($id)
    {
        NewsPost::where('id',$id)->update(['feature'=>1]);
    
        return response()->json([
            'flash_message_success' => 'News Post Feature Successfully'
        ],200);
    }
    
    public function video($id)
    {
        $news = NewsPost::findOrFail($id);
        return view('admin.news.news_video',compact('news'));
    }
    
    public function video_create($id)
    {
        $news = NewsPost::findOrFail($id);
        return view('admin.news.video_create',compact('news'));
    }
    
    public function video_store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            ini_set('max_execution_time', 3000);
            ini_set('memory_limit','256M');
            
            $news_video = new NewsPostVideo();
            
            $news_video->news_id = $request->news_id;
    
            if($request->hasFile('thumbnail')){
        
                $image_tmp = $request->file('thumbnail');
                if($image_tmp->isValid()){
                    $extenson = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extenson;
            
                    $video_image_path = public_path().'/assets/admin/uploads/video_image/'.$filename;
            
                    //Resize Image
                    Image::make($image_tmp)->resize(720,604)->save($video_image_path);
                    
                    $news_video->thumbnail = $filename;
            
                }
            }
    
            if ($request->hasFile('video'))
            {
                $video_temp = Input::file('video');
        
                $video_name = $video_temp->getClientOriginalName();
                $video_path = public_path().'/assets/admin/uploads/news_videos/';
                $video_temp->move($video_path,$video_name);
                
                $news_video->video = $video_name;
            }
            
            
            $news_video->save();
    
            return response()->json([
                'flash_message_success' => 'News Videos Added Successfully'
            ],200);
            
        }
    }
    
    public function video_getData()
    {
        $news_video = DB::table('news_post_videos')
                        ->select(
                            'news_post_videos.id',
                            'news_post_videos.video',
                            'news_post_videos.thumbnail',
                            'news_posts.title',
                            'news_posts.id as pid'
                        )
                        ->join('news_posts','news_post_videos.news_id','=','news_posts.id')
                        ->get();
        //dd($news_video);
    
        return DataTables::of($news_video)
            ->addIndexColumn()
            ->addColumn('video',function ($news_video){
                if (!empty($news_video->video))
                {
                    $url=asset("assets/admin/uploads/news_videos/$news_video->video");
                    return '<video width="320" height="240" controls autoplay>
                            <source src="'.$url.'" type="video/mp4">
                        </video>';
                }else{
                    return "<p>No video in this news</p>";
                }
                
            })
    
            ->addColumn('thumbnail',function ($news_video){
                if (!empty($news_video->thumbnail))
                {
                    $url=asset("assets/admin/uploads/video_image/$news_video->thumbnail");
                    return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />';
                }else{
                    return "<p>No thumbnail in this news</p>";
                }
        
            })
            ->editColumn('action', function ($news_video) {
                $return = "<div class=\"btn-group\">";
                if (!empty($news_video->title))
                {
                    $return .= "
                            <a href=\"/news/video/$news_video->pid/video_edit/$news_video->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$news_video->id\" rel1=\"/news/video/delete-video\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
                        
                                  ";
                }
                $return .= "</div>";
                return $return;
            })
            ->rawColumns([
                'video','thumbnail','action'
            ])
            ->make(true);
    }
    
    public function video_edit($id,$video_id)
    {
        $news = NewsPost::findOrFail($id);
        $video = NewsPostVideo::findOrFail($video_id);
        return view('admin.news.video_edit',compact('news','video'));
    }
    
    public function video_update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            ini_set('max_execution_time', 3000);
            ini_set('memory_limit','256M');
    
            $news_video = NewsPostVideo::findOrFail($id);
    
            $news_video->news_id = $request->news_id;
    
            if($request->hasFile('thumbnail')){
        
                $image_tmp = $request->file('thumbnail');
                if($image_tmp->isValid()){
                    $extenson = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extenson;
            
                    $video_image_path = public_path().'/assets/admin/uploads/video_image/'.$filename;
            
                    //Resize Image
                    Image::make($image_tmp)->resize(720,604)->save($video_image_path);
            
                }
            }else{
                $filename = $request->current_image;
            }
    
            $news_video->thumbnail = $filename;
    
            if ($request->hasFile('video'))
            {
                $video_temp = Input::file('video');
        
                $video_name = $video_temp->getClientOriginalName();
                $video_path = public_path().'/assets/admin/uploads/news_videos/';
                $video_temp->move($video_path,$video_name);
            }else{
    
                $video_name = $request->current_video;
            }
    
            $news_video->video = $video_name;
    
    
            $news_video->save();
    
            return response()->json([
                'flash_message_success' => 'News Videos Updated Successfully'
            ],200);
        }
    }
    
    public function video_remove($id)
    {
        $video = NewsPostVideo::where('id',$id)->first();
        
        $video_path = public_path().'/assets/admin/uploads/news_videos/'.$video->video;
        
        if (!empty($video->video))
        {
            unlink($video_path);
        }
    
        $video->update(['video'=>null]);
    
        return response()->json([
            'flash_message_success' => 'Video Deleted Successfully'
        ],200);
    }
    
    public function imageDelete($id)
    {
        $video = NewsPostVideo::where('id',$id)->first();
    
        $image_path = public_path().'/assets/admin/uploads/video_image/'.$video->thumbnail;
    
        if (!empty($video->thumbnail))
        {
            unlink($image_path);
        }
    
        $video->update(['thumbnail'=>null]);
    
        return response()->json([
            'flash_message_success' => 'Image Deleted Successfully'
        ],200);
    }
    
    public function videoDelete($id)
    {
        $news_video = NewsPostVideo::findOrFail($id);
        
        $video_path = public_path().'/assets/admin/uploads/news_videos/'.$news_video->video;
        
        if (!empty($news_video->video))
        {
            unlink($video_path);
        }
        
        $news_video->delete();
    
        return response()->json([
            'flash_message_success' => 'News Videos Deleted Successfully'
        ],200);
    }
}
