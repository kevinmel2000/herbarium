<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\AuthorIdent;
use App\Model\CharacterSpecies;
use App\Model\Collector;
use App\Model\Species;
use App\Model\Herbarium;
use App\Model\Genus;
use App\Model\Family;
use App\Model\Vernacular;
use App\Model\Location;
use App\Model\District;
use App\Model\City;
use App\Model\Province;
use App\Model\State;
use App\Model\HerbariumType;
use App\Model\Picture;

class UHomeController extends Controller
{
   public function index(){
 		$homes = DB::table('speciment_herbarium')
 			->join('species', 'speciment_herbarium.species_id', '=', 'species.id_species')
 			->join('genus', 'species.genus_id', '=', 'genus.id_genus')
 			->join('family', 'genus.family_id', '=', 'family.id_family')
 			->join('collector', 'speciment_herbarium.collector_id', '=', 'collector.id_collector')
 			->join('herba_author', 'speciment_herbarium.authorIdentification_id', '=', 'herba_author.id_authorHerba')
         	->join('author_identification', 'herba_author.author1_id', '=', 'author_identification.id_author')
			->join('venacular', 'species.vernacular_id', '=', 'venacular.id_venacular')
 			->join('location', 'speciment_herbarium.location_id', '=', 'location.id_location')
 			->join('districts', 'location.district_id', '=', 'districts.id_districts')
 			->join('city', 'districts.city_id', '=', 'city.id_city')
 			->join('province', 'city.prov_id', '=', 'province.id_prov')
 			->join('state', 'province.state_id', '=', 'state.id_state')
 			->join('herbarium_type', 'speciment_herbarium.type_herbarium', '=', 'herbarium_type.id_type')
			->join('characteristic_species', 'species.character_id', '=', 'characteristic_species.id_character')
 			->join('verified', 'speciment_herbarium.verifiedData_id', '=', 'verified.id_verified')
			->select(
				 'speciment_herbarium.*', 
				 'species.name_species', 
				 'herba_author.*',
				 'collector.name_collector', 
				 'collector.date_collection',
			     'author_identification.name_author', 
				 'author_identification.date_ident', 
				 'author_identification.agency',
				 'genus.name_genus',
			 	 'family.name_family', 
				 'species.subspecies', 
				 'species.variety', 
				 'species.origin_species', 
				 'species.species_synonim',
			  	 'venacular.venacular_name', 
			     'species.description_species', 
				 'collector.tim_collector', 
				 'location.*',
				 'districts.name',
				 'city.name', 
				 'province.name',
				 'state.name',  
				 'herbarium_type.name',
				 'verified.*',
				 'characteristic_species.picture_species', 	
				 'characteristic_species.picture_species2', 	
				 'characteristic_species.picture_species3',
				 'characteristic_species.picture_species4',	
				 'characteristic_species.picture_species5',	
				 'characteristic_species.picture_species6');
		
 		$terbaru = $homes->where('status', 2)->orderBy('verified.create_at', 'desc')->take(3)->get();
		// dd($terbaru);
		$totalherba = $this->total();
		
		$totalcollec = $this->collector();
		
		$picture1 = Picture::where('id_picture', 1)->pluck('pic_biot')->first();
		// dd($picture1);
		$picture2 = Picture::where('id_picture', 2)->pluck('pic_biot')->first();
		$picture3 = Picture::where('id_picture', 3)->pluck('pic_biot')->first();

		
 		return view('user/home', ['terbaru'=> $terbaru, 'total' => $totalherba, 'collector' => $totalcollec, 'pic1' => $picture1, 'pic2' => $picture2, 'pic3' => $picture3]);
 	}

  public function total(){
    $herba= Herbarium::select('id_herbarium')->count();
    return $herba;
  }
  public function collector(){
    $collec = Collector::select('id_collector')->count();
    return $collec;
  }

}
