<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class NewsPostController extends Controller
{
    public function getNews()
    {
        $news = DB::table('news_posts')
                    ->select(
                        'news_posts.id as id',
                        'types.name as type_name',
                        'countries.country_name as country_name',
                        'divisons.division_name as division_name',
                        'zillas.zilla_name as zilla_name',
                        'up_zillas.upzilla_name as upzilla_name',
                        'news_categories.category_name as category_name',
                        'news_sub_categories.sub_category_name as subcategory_name',
                        'tags.tah_name as tag_name',
                        'news_posts.headline as headline',
                        'news_posts.title as title',
                        'news_posts.description as description',
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
                    ->where('news_posts.status','=',1)
                    ->orWhere('news_posts.publish','=',1)
                    ->get();

        if ($news === null)
        {
            return response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);

        }else{
            return response()->json([
                'success' => true,
                'news' => $news,
                'status_code' => 200
            ],Response::HTTP_OK);
        }

    }

    public function newsDetails($id)
    {
        $news_details = DB::table('news_posts')
                            ->select(
                                'news_posts.id as id',
                                'types.name as type_name',
                                'countries.country_name as country_name',
                                'divisons.division_name as division_name',
                                'zillas.zilla_name as zilla_name',
                                'up_zillas.upzilla_name as upzilla_name',
                                'news_categories.category_name as category_name',
                                'news_sub_categories.sub_category_name as subcategory_name',
                                'tags.tah_name as tag_name',
                                'news_posts.headline as headline',
                                'news_posts.title as title',
                                'news_posts.description as description',
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
                            ->where('news_posts.id', $id)
                            ->where('news_posts.status','=',1)
                            ->Where('news_posts.publish','=',1)
                            ->first();

        if ($news_details === null)
        {
            return \response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'news_details' => $news_details,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }

    public function newsPopular()
    {
        $news_popular = DB::table('news_posts')
                            ->select(
                                'news_posts.id as id',
                                'news_posts.news_count as news_count',
                                'types.name as type_name',
                                'countries.country_name as country_name',
                                'divisons.division_name as division_name',
                                'zillas.zilla_name as zilla_name',
                                'up_zillas.upzilla_name as upzilla_name',
                                'news_categories.category_name as category_name',
                                'news_sub_categories.sub_category_name as subcategory_name',
                                'tags.tah_name as tag_name',
                                'news_posts.headline as headline',
                                'news_posts.title as title',
                                'news_posts.description as description',
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
                            ->where('news_posts.news_count','>=',100)
                            ->where('news_posts.status','=',1)
                            ->Where('news_posts.publish','=',1)
                            ->get();

        if ($news_popular === null)
        {
            return \response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'news_popular' => $news_popular,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }

    public function newsSearch(Request $request)
    {
        $headline = $request->headline;
        $title = $request->title;

        $news_search = DB::table('news_posts')
                            ->select(
                                'news_posts.id as id',
                                'types.name as type_name',
                                'countries.country_name as country_name',
                                'divisons.division_name as division_name',
                                'zillas.zilla_name as zilla_name',
                                'up_zillas.upzilla_name as upzilla_name',
                                'news_categories.category_name as category_name',
                                'news_sub_categories.sub_category_name as subcategory_name',
                                'tags.tah_name as tag_name',
                                'news_posts.headline as headline',
                                'news_posts.title as title',
                                'news_posts.description as description',
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
                            ->where('news_posts.status','=',1)
                            ->Where('news_posts.publish','=',1)
                            ->Where('news_posts.feature','=',1)
                            ->where('news_posts.headline','LIKE','%'.$headline.'%')
                            ->orWhere('news_posts.title','LIKE','%'.$title.'%')
                            ->get();

        if ($news_search === null)
        {
            return \response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'news_search' => $news_search,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }

    public function getNewsLatest()
    {
        $news_latest = DB::table('news_posts')
                        ->select(
                            'news_posts.id as id',
                            'types.name as type_name',
                            'countries.country_name as country_name',
                            'divisons.division_name as division_name',
                            'zillas.zilla_name as zilla_name',
                            'up_zillas.upzilla_name as upzilla_name',
                            'news_categories.category_name as category_name',
                            'news_sub_categories.sub_category_name as subcategory_name',
                            'tags.tah_name as tag_name',
                            'news_posts.headline as headline',
                            'news_posts.title as title',
                            'news_posts.description as description',
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
                        ->where('news_posts.status','=',1)
                        ->Where('news_posts.publish','=',1)
                        ->Where('news_posts.feature','=',1)
                        ->get();

        if ($news_latest === null)
        {
            return response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);

        }else{
            return response()->json([
                'success' => true,
                'news_latest' => $news_latest,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }
}
