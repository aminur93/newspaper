<?php

namespace App\Http\Controllers\Admin;

use App\Types;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class TypesController extends Controller
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

        return view('admin.types.index', compact('post_notification','total'));
    }
    
    public function create()
    {
        return view('admin.types.create');
    }
    
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $types = new Types();
    
                $types->name = $request->name;
    
                $types->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Types Added Successfully'
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
    
    public function getData()
    {
        $typ = Types::latest()->get();
        
        //dd($types);
    
        return DataTables::of($typ)
            ->addIndexColumn()
            ->editColumn('action', function ($typ) {
                $return = "<div class=\"btn-group\">";
                if (!empty($typ->name))
                {
                    $return .= "
                            <a href=\"/types/edit/$typ->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$typ->id\" rel1=\"delete-types\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
    
    public function edit($id)
    {
        $types = Types::findOrFail($id);
        
        return view('admin.types.edit',compact('types'));
    }
    
    public function update(Request $request, $id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $types = Types::findOrFail($id);
            
                $types->name = $request->name;
            
                $types->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Types Updated Successfully'
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
        $types = Types::findOrFail($id);
        $types->delete();
    
        return response()->json([
            'flash_message_success' => 'Types Deleted Successfully'
        ],200);
    }
}
