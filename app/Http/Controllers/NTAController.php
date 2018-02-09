<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\NTA;
use App\models\Division;
use App\models\AccessWay;
use App\models\Climate;
use App\models\EnvCategory;
use App\models\NTAType;
use App\models\Activity;
use Illuminate\Support\Facades\Storage;
use App\models\Picture;

class NTAController extends Controller {
	//
	private $image_dir = "nta/";
	public function show(Request $request, NTA $nta){
		return view ( 'nta.main', [
				"nta" => $nta,
		] );
	}
	
	
	public function index(Request $request) {
		$ntas = NTA::all();
		return view ( 'nta.index', [ 
				"ntas" => $ntas,
		] );
	}
	
	public function search(Request $request){
		$query = $request->searchQuery;
		$NTASet = NTA::where('name','LIKE','%'.$query.'%')
						->orWhere('description',"LIKE",'%'.$query.'%')
						->orWhere('englishName',"LIKE",'%'.$query.'%')
						->orWhere('folkAddress',"LIKE",'%'.$query.'%')
						->orWhere('englishAddress',"LIKE",'%'.$query.'%')
						->distinct()->get();
		return view('nta.results',[
				"query"=>$query,
				"results"=>$NTASet,
		]);
	}
	public function form(Request $request) {
		$climates = Climate::all ();
		$envCats = EnvCategory::all ();
		$ntatypes = NTAType::all ();
		$states = Division::where ( 'parent_id', 1 )->orderBy ( 'name', 'asc' )->get (); // finding main states or ostan ha
		$activities = Activity::all ();
		$data = array ();
		$data ["climates"] = $climates;
		$data ["envCats"] = $envCats;
		$data ["ntatypes"] = $ntatypes;
		$data ["states"] = $states;
		$data ["activities"] = $activities;
		return view ( "nta.form", $data );
	}
	
	// name, englishName, description, climate, envCategory, NTAType
	public function store(Request $request) {
		$this->validate ( $request, [ 
				'name' => 'required',
				'englishName' => 'required',
				'climate' => 'exists:climate,id',
				'envCategory' => '',
				'NTAType' => '',
				'division' => 'required',
				'xPosition' => 'required',
				'yPosition' => 'required' 
		] );//to be completed
		$data = array ();
		$data ['req'] = $request;
		$insertionArray = array (
				'name' => $request->name,
				'englishName' => $request->englishName,
				'description' => $request->description,
				'climate_id' => $request->climate,
				'envCat_id' => $request->envCategory,
				'ntaType_id' => $request->NTAType,
				'division_id' => $request->division,
				'xPosition' => $request->xPosition,
				'yPosition' => $request->yPosition 
		)
		// ''=>$request->,
		;
		$nta = NTA::create ( $insertionArray );
		
		//attaching activities to nta
		$activities = collect ( $request->activity );
		$activities->each ( function ($item) use ($nta) {
			$nta->activities ()->attach ( $item );
		} );
		
		// attaching access ways to newly created nta
		$accessWays = collect ( AccessWay::$accessName ); // converts the array to collection in order to call each function
		$accessWays->each ( function ($item, $key) use ($request, $nta) {
			$str = $item . "Access"; // e.g. airAccess
			$desc = $request->$str; // finding user input
			if ($desc) { // if user has entered any value for this access
				$nta->accessWays ()->attach ( $key, [ 
						"description" => $desc 
				] ); // inserts a row in intermediate table
			}
		} );
		
		$disk = Storage::disk('public');
		$disk->makeDirectory($this->image_dir.$nta->id);//creating the directory for this nta
		//no problem occurs if directory already exists
		if ($request->hasFile('image') && $request->file('image')->isValid()) {//if image uploaded
			$file = $request->file('image');
			$fileExt = $file->guessExtension();
// 			$filename = "main-".date("Y-m-d_H-i").".".$fileExt;
			$filename = "main.".$fileExt;
			$destinaton =$this->image_dir.$nta->id."/".$filename;
			$disk->put($destinaton,file_get_contents($request->file('image')->getRealPath()));//move file
			//creating the picture object
			$pic = new Picture();
			$pic->nta_id = $nta->id;
			$pic->picfile = $filename;
			$pic->save();//saving in db
		} else {//no image uploaded or a problem in uploading
			//may log something
		}
		$data ["req"] = $request;
		$data ['nta'] = $nta;
		return view ( "nta.test", $data );
		
		// return redirect('/tasks');
	}
}
