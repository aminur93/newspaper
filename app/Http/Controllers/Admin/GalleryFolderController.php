<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\GalleryFolderName;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use File;

class GalleryFolderController extends Controller
{
    public function index()
    {
        $gallery = GalleryFolderName::get();
        return view('admin.gallery.index',compact('gallery'));
    }
    
    public function store(Request $request)
    {
        if ($request->isMethod('post'))
        {
            DB::beginTransaction();
        
            try{
                // Step 1 : Create Blood
                $gallery = new GalleryFolderName();
            
                $gallery->folder_name = $request->folder_name;
            
                $gallery->save();
    
                $path = public_path('/assets/admin/uploads/'.$request->folder_name);
    
                if(!File::isDirectory($path)){
        
                    File::makeDirectory($path, 0777, true, true);
        
                }
            
                DB::commit();
            
                return response()->json([
                    'flash_message_success' => 'Gallery Folder Name Added Successfully'
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
        $gallery = GalleryFolderName::findOrFail($id);
        
    
        $path = public_path('/assets/admin/uploads/'.$gallery->folder_name);
    
        File::deleteDirectory($path);
    
        $gallery->delete();
    
        return response()->json([
            'flash_message_success' => 'Gallery Folder Name Deleted Successfully'
        ],200);
    }
    
    
    public function image($id)
    {
        $gallery = GalleryFolderName::findOrFail($id);
        return view('admin.gallery.show',compact('gallery'));
    }
    
    public function upload(Request $request,$id)
    {
        $gallery = GalleryFolderName::findOrFail($id);
    
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('assets/admin/uploads/'.$gallery->folder_name.'/'),$imageName);
        
        $gallery_images = new Gallery();
    
        $gallery_images->folder_id = $gallery->id;
        $gallery_images->gallery_image = $imageName;
        
        $gallery_images->save();
    
        return response()->json([
            'flash_message_success' => 'Gallery Image Successfully'
        ],200);
    }
    
    public function image_delete(Request $request)
    {
        $filename =  $request->get('filename');
    
        Gallery::where('gallery_image',$filename)->delete();
    
        $path = public_path().'/assets/admin/uploads/pavel/'.$filename;
        
        if (file_exists($path)) {
            unlink($path);
        }
    
        return response()->json([
            'flash_message_success' => 'Gallery Image Deleted'
        ],200);
    }
}
