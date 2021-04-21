<?php

namespace App\Http\Controllers\Api;

use App\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function getCategory()
    {
        $category = NewsCategory::with('subcategory')->latest()->get();

        if ($category === null)
        {
            return response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return response()->json([
                'success' => true,
                'category' => $category,
                'status_code' => 200
            ],Response::HTTP_OK);
        }

    }

    public function getCategoryNews($id)
    {
        $category_news = DB::table('news_categories')
                            ->select(
                                'news_categories.id as id',
                                'news_categories.category_name as category_name',
                                'types.name as type_name',
                                'countries.country_name as country_name',
                                'divisons.division_name as division_name',
                                'zillas.zilla_name as zilla_name',
                                'up_zillas.upzilla_name as upzilla_name',
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
                            ->leftJoin('news_posts','news_categories.id','=','news_posts.category_id')
                            ->leftJoin('news_address','news_posts.id','=','news_address.news_id')
                            ->leftJoin('types','news_address.types_id','=','types.id')
                            ->leftJoin('countries','news_address.country_id','=','countries.id')
                            ->leftJoin('divisons','news_address.division_id','=','divisons.id')
                            ->leftJoin('zillas','news_address.zilla_id','=','zillas.id')
                            ->leftJoin('up_zillas','news_address.upzilla_id','=','up_zillas.id')
                            ->leftJoin('news_sub_categories','news_posts.sub_cat_id','=','news_sub_categories.id')
                            ->leftJoin('tags','news_posts.tag_id','=','tags.id')
                            ->where('news_categories.id',$id)
                            ->Where('news_posts.status','=',1)
                            ->Where('news_posts.publish','=',1)
                            ->get();

        if ($category_news === null)
        {
            return \response()->json([
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'category_news' => $category_news,
                'status_code' => 200
            ],Response::HTTP_OK);
        }


    }

    public function getSubCategoryNews($id)
    {
        $sub_category = DB::table('news_sub_categories')
                            ->select(
                                'news_sub_categories.id as id',
                                'news_sub_categories.sub_category_name as sub_category_name',
                                'types.name as type_name',
                                'countries.country_name as country_name',
                                'divisons.division_name as division_name',
                                'zillas.zilla_name as zilla_name',
                                'up_zillas.upzilla_name as upzilla_name',
                                'news_categories.category_name as category_name',
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
                            ->leftJoin('news_posts','news_sub_categories.id','=','news_posts.sub_cat_id')
                            ->leftJoin('news_address','news_posts.id','=','news_address.news_id')
                            ->leftJoin('types','news_address.types_id','=','types.id')
                            ->leftJoin('countries','news_address.country_id','=','countries.id')
                            ->leftJoin('divisons','news_address.division_id','=','divisons.id')
                            ->leftJoin('zillas','news_address.zilla_id','=','zillas.id')
                            ->leftJoin('up_zillas','news_address.upzilla_id','=','up_zillas.id')
                            ->leftJoin('news_categories','news_posts.category_id','=','news_categories.id')
                            ->leftJoin('tags','news_posts.tag_id','=','tags.id')
                            ->where('news_sub_categories.id',$id)
                            ->Where('news_posts.status','=',1)
                            ->Where('news_posts.publish','=',1)
                            ->get();

        if ($sub_category === null)
        {
            return \response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'sub_category_news' => $sub_category,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }
}
