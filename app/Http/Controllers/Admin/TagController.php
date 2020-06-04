<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    public function index()
    {
        return view('admin.tag.index');
    }
    
    public function create()
    {
        return view('admin.tag.create');
    }
    
    public function getData()
    {
        $tag = Tag::latest()->get();
        
        //dd($types);
        
        return DataTables::of($tag)
            ->addIndexColumn()
            ->editColumn('action', function ($tag) {
                $return = "<div class=\"btn-group\">";
                if (!empty($tag->tah_name))
                {
                    $return .= "
                            <a href=\"/tag/edit/$tag->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$tag->id\" rel1=\"delete-tag\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
                $tag = new Tag();
            
                $tag->tah_name = $request->tag_name;
            
                $tag->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Tag Added Successfully'
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
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit',compact('tag'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $tag = Tag::findOrFail($id);
            
                $tag->tah_name = $request->tag_name;
            
                $tag->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Tag Updated Successfully'
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
        $tag = Tag::findOrFail($id);
        $tag->delete();
    
        return response()->json([
            'flash_message_success' => 'Tag Deleted Successfully'
        ],200);
    }
}
