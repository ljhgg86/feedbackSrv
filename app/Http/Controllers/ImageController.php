<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image, Response;

class ImageController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    public function uploadImgFile(Request $request)
    {
        //$files1 = $request->file('files');
        $imageSrcs=array();
        //$imageCounts=$request->input['imageCounts'];
        $imageCounts=$_POST['imageCounts'];
        $files=$_FILES['files'];
        if(($imageCounts+count($files['name']))>5){
            return response()->json(['errors' => '最多只能总共5张图片!']);
        }
        //$files3=$request->all();
        foreach($files['type'] as $key=>$fileType){
	        //$ext=strtolower($file->getClientOriginalExtension());
	        $fileType=pathinfo($files['name'][$key],PATHINFO_EXTENSION);
        	$ext=strtolower($fileType);
	        $allowed_extensions = array("jpg", "bmp", "gif", "tif","png","jpeg");
	        if ($ext && !in_array($ext, $allowed_extensions)) {
	            return Response::json([ 'errors' => '只能上传png、jpg、gif、等等文件.']);
	        }
	        $destinationPath = env('UPLOAD_FILE_PATH',config('feedback.image_path'));
	        //$extension = $file->getClientOriginalExtension();
	        $fileName = str_random(16).'.'.$fileType;
	        //$file->move($destinationPath, $fileName);
            move_uploaded_file($files["tmp_name"][$key],($destinationPath.$fileName));
	        //move_uploaded_file($files["tmp_name"][$key],public_path($destinationPath.$fileName));
	        $img = Image::make(public_path($destinationPath.$fileName))
	                    ->resize(640, null, function ($constraint) {
	                                        $constraint->aspectRatio();
	                                    });
	        $img->save(public_path($destinationPath.$fileName));
            $upload_prefix = env('UPLOAD_PREFIX', config('app.url'));
	        array_push($imageSrcs,$upload_prefix.$fileName);
	    }
        return Response::json(
            [
                'success' => true,
                'imageSrcs' =>$imageSrcs,
                'imageCounts' =>$imageCounts,
                'imageCounts1' => ($imageCounts+count($files['name']))            ]
        );
    }

    public function uploadImgFileApi(Request $request)
    {
        $file=$_FILES['file'];
        $fileType=pathinfo($file['name'],PATHINFO_EXTENSION);
        $ext=strtolower($fileType);
        $allowed_extensions = array("jpg", "bmp", "gif", "tif","png","jpeg");
        if ($ext && !in_array($ext, $allowed_extensions)) {
            return Response::json([ 'errors' => '只能上传png、jpg、gif、等等文件.']);
        }
        $destinationPath = env('UPLOAD_FILE_PATH',config('feedback.image_path'));
        $fileName = str_random(16).'.'.$fileType;
        //move_uploaded_file($file["tmp_name"],public_path($destinationPath.$fileName));
        move_uploaded_file($file["tmp_name"],($destinationPath.$fileName));
        $img = Image::make(public_path($destinationPath.$fileName))
                    ->resize(640, null, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
        $img->save(public_path($destinationPath.$fileName));
        $upload_prefix = env('UPLOAD_PREFIX', config('app.url'));
        $imageSrcs=$upload_prefix.$fileName;
   
        return Response::json(
            [
                'success' => true,
                'status' => true,
                'imageSrcs' =>$imageSrcs
            ]
        );
    }
}
