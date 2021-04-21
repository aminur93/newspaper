<?php

namespace App\Http\Controllers\Api;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function getTag()
    {
        $tags = Tag::latest()->get();

        if ($tags === null)
        {
            return response()->json([
                'success' => false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return response()->json([
                'success' => true,
                'tags' => $tags,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }

    public function getTagNews($id)
    {
        $tag_news = DB::table('tags')
                        ->select(
                            'tags.id as id',
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
                        ->leftJoin('news_posts','tags.id','=','news_posts.tag_id')
                        ->leftJoin('news_address','news_posts.id','=','news_address.news_id')
                        ->leftJoin('types','news_address.types_id','=','types.id')
                        ->leftJoin('countries','news_address.country_id','=','countries.id')
                        ->leftJoin('divisons','news_address.division_id','=','divisons.id')
                        ->leftJoin('zillas','news_address.zilla_id','=','zillas.id')
                        ->leftJoin('up_zillas','news_address.upzilla_id','=','up_zillas.id')
                        ->leftJoin('news_categories','news_posts.category_id','=','news_categories.id')
                        ->leftJoin('news_sub_categories','news_posts.sub_cat_id','=','news_sub_categories.id')
                        ->where('tags.id','=',$id)
                        ->Where('news_posts.status','=',1)
                        ->Where('news_posts.publish','=',1)
                        ->get();

        if ($tag_news === null)
        {
            return \response()->json([
                'success' =>false,
                'error' => 'Record not found',
                'status_code' => 500
            ],Response::HTTP_INTERNAL_SERVER_ERROR);
        }else{
            return \response()->json([
                'success' => true,
                'tag_news' => $tag_news,
                'status_code' => 200
            ],Response::HTTP_OK);
        }
    }
}
