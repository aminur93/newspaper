<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Types;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    public function index()
    {
        return view('admin.country.index');
    }
    
    public function create()
    {
        $types = Types::get();
        return view('admin.country.create',compact('types'));
    }
    
    public function getData()
    {
        $country = DB::table('countries')
                        ->select(
                            'countries.id',
                            'types.name',
                            'countries.country_name'
                        )
                        ->join('types','countries.types_id','=','types.id')
                        ->get();
    
        //dd($country);
    
        return DataTables::of($country)
            ->addIndexColumn()
            ->editColumn('action', function ($country) {
                $return = "<div class=\"btn-group\">";
                if (!empty($country->name))
                {
                    $return .= "
                            <a href=\"/country/edit/$country->id\" style='margin-right: 5px' class=\"btn btn-sm btn-warning\"><i class='fa fa-edit'></i></a>
                            ||
                              <a rel=\"$country->id\" rel1=\"delete-country\" href=\"javascript:\" style='margin-right: 5px' class=\"btn btn-sm btn-danger deleteRecord \"><i class='fa fa-trash'></i></a>
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
                $country = new Country();
    
                $country->types_id = $request->types_id;
                $country->country_name = $request->country_name;
                
                $country->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Country Added Successfully'
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
        $country = Country::findOrFail($id);
        return view('admin.country.edit',compact('types','country'));
    }
    
    public function update(Request $request,$id)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $country = Country::findOrFail($id);
            
                $country->types_id = $request->types_id;
                $country->country_name = $request->country_name;
            
                $country->save();
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Country Updated Successfully'
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
        $country = Country::findOrFail($id);
        $country->delete();
    
        return response()->json([
            'flash_message_success' => 'Country Deleted Successfully'
        ],200);
    }
}
