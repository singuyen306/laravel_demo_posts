<?php

namespace App\Http\Controllers\Froala;

use App\Http\Controllers\Controller;
use App\Repository\FileUploadFroala\FileUploadFroalaInterface;
use Illuminate\Http\Request;
use App\Model\FileUploadFroala;
use App\Helper\Helper;

class FileUploadsController extends Controller
{
    private $fileUploadFroala;

    public function __construct(FileUploadFroalaInterface $fileUploadFroala)
    {
        $this->fileUploadFroala = $fileUploadFroala;

    }

    /**
	 * This returns a json array of links to fill the image manager in Froala forms. DO NOT CHANGE.
	 * @return JSON Returns a json array of links.
	 */
	public function index(){
		$images = $this->fileUploadFroala->all();
		$list = array();
		foreach($images as $image){
			$img = new \StdClass;
			$img->url  = $image->path;
			$img->thumb = $image->path;
			$img->id = $image->id;
			$list[] = $img;
		}
		return stripslashes(response()->json($list)->content());
	}

	/**
	 * Stores images uploaded from a Froala enabled form. 
	 * @param  Request $request the POST request
	 * @return JSON     Returns a json link with a url (used to insert image into article/page). DO NOT CHANGE.
	 */
	public function store(Request $request){
        $fileName           = $request->file('image')->getClientOriginalName();;
        $destinationPath 	= 'upload/posts/';
        Helper::checkPermisionAndCreateFoder($destinationPath);
        $request->file('image')->move($destinationPath, $fileName);
		$completePath = url('/' . $destinationPath . $fileName);
		$dataCreate = [
		    'title' => $fileName,
            'path' => $completePath
        ];
		$this->fileUploadFroala->create($dataCreate);
        return stripslashes(response()->json(['link' => $completePath])->content());

	}

	/**
	 * Find and delete the deleted image.
	 * @param  Request  $request 	[description]
	 * @param  int  	$id      	Department ID
	 */
    public function destroy(Request $request){
    	$input = $request->all();
    	$url = parse_url($input['src']);
    	$splitPath = explode("/", $url["path"]);
    	$splitPathLength = count($splitPath);
        FileUploadFroala::where('path', 'LIKE', '%' . $splitPath[$splitPathLength-1] . '%')->delete();
    }
}
