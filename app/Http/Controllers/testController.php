<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class testController extends Controller
{
	private $image_dir = "nta/";
	public function form(Request $request){
		return view ('test.form');
	}
	public function store(Request $request){
		$disk = Storage::disk('public');
		$id = 0;
		$disk->makeDirectory($this->image_dir.$id);
		$fileExt = "";
		$destinaton = "";
		echo "here";
		if ($request->file('image')->isValid()) {
			echo "yes";
			$file = $request->file('image');
			var_dump($file);
			$fileExt = $file->guessExtension();
			echo $fileExt;
			$destinaton =$this->image_dir.$id.".main.".$fileExt; 
			$disk->put($destinaton,file_get_contents($request->file('image')->getRealPath()));
		}		
		return view('test.result',[
				"req"=>$request,
				"fileExt"=>$fileExt,
				"dest"=>$destinaton,
		]);
	}
	
}
