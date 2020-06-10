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
        $gallery_image = Gallery::where('folder_id',$id)->get();
        return view('admin.gallery.show',compact('gallery','gallery_image'));
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
        $folder_id = $request->get('folder_id');
    
        Gallery::where('gallery_image',$filename)->delete();
    
        $gallery = GalleryFolderName::where('id',$folder_id)->first();
        
        if ($gallery->folder_name){
            
            $path = public_path().'/assets/admin/uploads/'.$gallery->folder_name.'/'.$filename;
    
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        
    
        return response()->json([
            'flash_message_success' => 'Gallery Uploaded Image Deleted'
        ],200);
    }
    
    public function folderImageDelete($id)
    {
        $gallery_images = Gallery::where('id',$id)->first();
        
        
        
        if (isset($_GET['folder_id']))
        {
            $folder_id = $_GET['folder_id'];
    
            $gallery = GalleryFolderName::where('id',$folder_id)->first();
    
            if ($gallery->folder_name){
        
                $path = public_path().'/assets/admin/uploads/'.$gallery->folder_name.'/'.$gallery_images->gallery_image;
        
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        
        $gallery_images->delete();
       
    
        return response()->json([
            'flash_message_success' => 'Gallery Folder Uploaded Image Deleted'
        ],200);
    }
}
