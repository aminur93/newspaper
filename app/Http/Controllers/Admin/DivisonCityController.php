<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Divison;
use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class DivisonCityController extends Controller
{
    public function index()
    {
        return view('admin.division_city.index');
    }
    
    public function create()
    {
        $types = Types::get();
        return view('admin.division_city.create',compact('types'));
    }
    
    public function getData()
    {
        $division_city = DB::table('divisons')
            ->select(
                'divisons.id',
                'types.name',
                'countries.country_name',
                'divisons.division_name'
            )
            ->join('types','divisons.types_id','=','types.id')
            ->join('countries','divisons.country_id','=','countries.id')
            ->get();
    
        //dd($country);
    
        return DataTables::of($division_city)
            ->addIndexColumn()
            ->editColumn('action', function ($division_city) {
                $return = "<div class=\"btn-group\">";
                if (!empty($division_city->name))
                {
                    $return .= "
                            <a href=\"/division_city/edit/$division_city->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$division_city->id\" rel1=\"delete-division_city\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
    
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $division_city = new Divison();
    
                $division_city->types_id = $request->types_id;
                $division_city->country_id = $request->country_id;
                $division_city->division_name = $request->division_name;
    
                $division_city->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Division/City Added Successfully'
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
        $types = Types::get();
        $country = Country::get();
        $division_city  = Divison::findOrfail($id);
        return view('admin.division_city.edit',compact('types','division_city','country'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $division_city = Divison::findOrfail($id);
            
                $division_city->types_id = $request->types_id;
                $division_city->country_id = $request->country_id;
                $division_city->division_name = $request->division_name;
            
                $division_city->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Division/City Updated Successfully'
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
        $divsion_city = Divison::findOrfail($id);
        $divsion_city->delete();
    
        return response()->json([
            'flash_message_success' => 'Division/City Delete Successfully'
        ],200);
    }
}
