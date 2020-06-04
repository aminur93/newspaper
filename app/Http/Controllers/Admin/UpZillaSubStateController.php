<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Divison;
use App\Types;
use App\UpZilla;
use App\Zilla;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class UpZillaSubStateController extends Controller
{
    public function index()
    {
        return view('admin.upzilla_substate.index');
    }
    
    public function create()
    {
        $types = Types::get();
        return view('admin.upzilla_substate.create',compact('types'));
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
    
    public function getDivisionCity()
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
    
    public function getZillaState()
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
            
            $option .= "<option value=''>Select Zilla/State</option>";
            
            foreach ($query as $value) {
                
                $id = $value->zid;
                
                $zilla_name = $value->zname;
                
                $option .= " <option value=" . $id . ">" . $zilla_name . "</option>";
                
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
                $upzilla_substate = new UpZilla();
    
                $upzilla_substate->types_id = $request->types_id;
                $upzilla_substate->country_id = $request->country_id;
                $upzilla_substate->division_id = $request->division_id;
                $upzilla_substate->zilla_id = $request->zilla_id;
                $upzilla_substate->upzilla_name = $request->upzilla_name;
    
                $upzilla_substate->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'UpZilla/SubState Added Successfully'
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
        $upzilla_substate = DB::table('up_zillas')
            ->select(
                'up_zillas.id',
                'types.name',
                'countries.country_name',
                'divisons.division_name',
                'zillas.zilla_name',
                'up_zillas.upzilla_name'
            )
            ->join('types','up_zillas.types_id','=','types.id')
            ->join('countries','up_zillas.country_id','=','countries.id')
            ->join('divisons','up_zillas.division_id','=','divisons.id')
            ->join('zillas','up_zillas.zilla_id','=','zillas.id')
            ->get();
        
        //dd($country);
        
        return DataTables::of($upzilla_substate)
            ->addIndexColumn()
            ->editColumn('action', function ($upzilla_substate) {
                $return = "<div class=\"btn-group\">";
                if (!empty($upzilla_substate->name))
                {
                    $return .= "
                            <a href=\"/upzilla_substate/edit/$upzilla_substate->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$upzilla_substate->id\" rel1=\"delete-upzilla_substate\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
        $upzilla_substate = UpZilla::findOrFail($id);
        $country = Country::get();
        $division = Divison::get();
        $zilla = Zilla::get();
        return view('admin.upzilla_substate.edit',compact('types','upzilla_substate','country','division','zilla'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $upzilla_substate = UpZilla::findOrFail($id);
            
                $upzilla_substate->types_id = $request->types_id;
                $upzilla_substate->country_id = $request->country_id;
                $upzilla_substate->division_id = $request->division_id;
                $upzilla_substate->zilla_id = $request->zilla_id;
                $upzilla_substate->upzilla_name = $request->upzilla_name;
            
                $upzilla_substate->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'UpZilla/SubState Updated Successfully'
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
        $upzilla_substate = UpZilla::findOrFail($id);
        $upzilla_substate->delete();
    
        return response()->json([
            'flash_message_success' => 'UpZilla/SubState Deleted Successfully'
        ],200);
    }
}
