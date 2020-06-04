<?php

namespace App\Http\Controllers\Admin;

use App\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    
    public function create()
    {
        return view('admin.category.create');
    }
    
    public function getData()
    {
        $category = NewsCategory::latest()->get();
    
        //dd($types);
    
        return DataTables::of($category)
            ->addIndexColumn()
            ->editColumn('action', function ($category) {
                $return = "<div class=\"btn-group\">";
                if (!empty($category->category_name))
                {
                    $return .= "
                            <a href=\"/category/edit/$category->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$category->id\" rel1=\"delete-category\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
                $category = new NewsCategory();
            
                $category->category_name = $request->category_name;
            
                $category->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Category Added Successfully'
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
        $category = NewsCategory::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $category = NewsCategory::findOrFail($id);
            
                $category->category_name = $request->category_name;
            
                $category->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Category Updated Successfully'
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
        $category = NewsCategory::findOrfail($id);
        $category->delete();
    
        return response()->json([
            'flash_message_success' => 'Category Deleted Successfully'
        ],200);
    }
}
