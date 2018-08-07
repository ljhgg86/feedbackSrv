<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Services\UploadsManager;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    protected $manager;

    public function __construct(UploadsManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Show page of files / subfolders
     */
    public function index(Request $request)
    {
        $folder = $request->get('folder');
        $data = $this->manager->folderInfo($folder);

        return view('upload.index', $data);
    }
    /**
	 * 上传文件
	 */
	public function uploadFile(UploadFileRequest $request)
	{
	    $file = $_FILES['files'];
	    // $fileName = $request->get('file_name');
	    // $fileName = $fileName ?: $file['name'];
	    $fileName = $file['name'];
	    $path = str_finish($request->get('folder'), '/') . $fileName;
	    $content = File::get($file['tmp_name']);

	    $result = $this->manager->saveFile($path, $content);

	    if ($result === true) {
	        return redirect()
	                ->back()
	                ->withSuccess("File '$fileName' uploaded.");
	    }

	    $error = $result ? : "An error occurred uploading file.";
	    return redirect()
	            ->back()
	            ->withErrors([$error]);
	}

}
