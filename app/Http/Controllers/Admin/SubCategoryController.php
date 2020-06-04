<?php

namespace App\Http\Controllers\Admin;

use App\NewsCategory;
use App\NewsSubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('admin.sub_category.index');
    }
    
    public function create()
    {
        $category = NewsCategory::get();
        return view('admin.sub_category.create',compact('category'));
    }
    
    public function getData()
    {
        $Subcategory = DB::table('news_sub_categories')
                        ->select(
                            'news_sub_categories.id',
                            'news_categories.category_name',
                            'news_sub_categories.sub_category_name'
                        )
                        ->join('news_categories','news_sub_categories.category_id','=','news_categories.id')
                        ->get();
        
        //dd($types);
        
        return DataTables::of($Subcategory)
            ->addIndexColumn()
            ->editColumn('action', function ($Subcategory) {
                $return = "<div class=\"btn-group\">";
                if (!empty($Subcategory->category_name))
                {
                    $return .= "
                            <a href=\"/sub_category/edit/$Subcategory->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$Subcategory->id\" rel1=\"delete-sub_category\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
                                  ";
                }
                $return .= "</div>";
                return $return;
            })
            ->rawColumns([
                'action'
            ])
            ->make(true);
    }
    
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $subcategory = new NewsSubCategory();
            
                $subcategory->category_id = $request->category_id;
                $subcategory->sub_category_name = $request->sub_category_name;
            
                $subcategory->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Sub Category Added Successfully'
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
    
    public function edit($id)
    {
        $category = NewsCategory::get();
        $sub_category = NewsSubCategory::findOrFail($id);
        return view('admin.sub_category.edit',compact('category','sub_category'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $subcategory = NewsSubCategory::findOrFail($id);
            
                $subcategory->category_id = $request->category_id;
                $subcategory->sub_category_name = $request->sub_category_name;
            
                $subcategory->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Sub Category Updated Successfully'
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
    
    public function destroy($id)
    {
        $sub_category = NewsSubCategory::findOrFail($id);
        $sub_category->delete();
    
        return response()->json([
            'flash_message_success' => 'Sub Category Deleted Successfully'
        ],200);
    }
}
