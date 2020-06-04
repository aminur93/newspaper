<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Divison;
use App\Types;
use App\Zilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class ZillaStateController extends Controller
{
    public function index()
    {
        return view('admin.zilla_state.index');
    }
    
    public function create()
    {
        $types = Types::get();
        return view('admin.zilla_state.create',compact('types'));
    }
    
    public function getCountry()
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
    
    public function getDivisionState()
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
        
            $option .= "<option value=''>Select Divsion/City</option>";
        
            foreach ($query as $value) {
            
                $id = $value->did;
            
                $division_name = $value->dname;
            
                $option .= " <option value=" . $id . ">" . $division_name . "</option>";
            
                //$show = array("id"=>$id, "subject_name"=>$subject_name);
            }
        
            echo $option;
        }
    }
    
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $zilla_state = new Zilla();
            
                $zilla_state->types_id = $request->types_id;
                $zilla_state->country_id = $request->country_id;
                $zilla_state->division_id = $request->division_id;
                $zilla_state->zilla_name = $request->zilla_name;
            
                $zilla_state->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Zilla/State Added Successfully'
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
        $zilla_state = DB::table('zillas')
            ->select(
                'zillas.id',
                'types.name',
                'countries.country_name',
                'divisons.division_name',
                'zillas.zilla_name'
            )
            ->join('types','zillas.types_id','=','types.id')
            ->join('countries','zillas.country_id','=','countries.id')
            ->join('divisons','zillas.division_id','=','divisons.id')
            ->get();
    
        //dd($country);
    
        return DataTables::of($zilla_state)
            ->addIndexColumn()
            ->editColumn('action', function ($zilla_state) {
                $return = "<div class=\"btn-group\">";
                if (!empty($zilla_state->name))
                {
                    $return .= "
                            <a href=\"/zilla_state/edit/$zilla_state->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$zilla_state->id\" rel1=\"delete-zilla_state\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
        $types = Types::get();
        $zilla_state = Zilla::findOrFail($id);
        $country = Country::get();
        $division = Divison::get();
        return view('admin.zilla_state.edit',compact('types','zilla_state','country','division'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $zilla_state = Zilla::findOrFail($id);
            
                $zilla_state->types_id = $request->types_id;
                $zilla_state->country_id = $request->country_id;
                $zilla_state->division_id = $request->division_id;
                $zilla_state->zilla_name = $request->zilla_name;
            
                $zilla_state->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Zilla/State Updated Successfully'
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
        $zilla_state = Zilla::findOrFail($id);
        $zilla_state->delete();
    
        return response()->json([
            'flash_message_success' => 'Zilla/State Deleted Successfully'
        ],200);
    }
}
