<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\AuthorIdent;
use App\CharacterSpecies;
use App\Collector;
use App\Species;
use App\Herbarium;
use App\Genus;
use App\Family;
use App\Vernacular;
use App\Location;
use App\Village;
use App\District;
use App\City;
use App\Province;
use App\State;
use App\HerbariumLabel;

class ULikenController extends Controller
{
 	public function index(){
 		$liken = DB::table('speciment_herbarium')
 			->join('species', 'speciment_herbarium.species_id', '=', 'species.id_species')
 			->join('genus', 'species.genus_id', '=', 'genus.id_genus')
 			->join('family', 'genus.family_id', '=', 'family.id_family')
 			->join('collector', 'speciment_herbarium.collector_id', '=', 'collector.id_collector')
 			->join('author_identification', 'speciment_herbarium.authorIdentification_id', '=', 'author_identification.id_author')
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
				 'characteristic_species.picture_species6')
 			->paginate(10);
			 $terbaru = $liken->where('status', 2)->where('type_herbarium', 4);
			//  dd($terbaru);
 		return view('user/herbarium/liken', ['likens' => $terbaru]);
 	}
 	public function search(Request $request){
 		$constraints = [
      'name_species' => $request['name_species'],
      'name_family' => $request['name_family'],
      'name_collector' => $request['name_collector'],
      'name_author' => $request['name_author']
      ];
 		$likens = $this->doSearchQuery($constraints);
 		return view('user/herbarium/liken', ['likens' => $likens, 'searchingVals' => $constraints]);
 	}
 	public function doSearchQuery($constraints){
    $query = DB::table('speciment_herbarium')
 			->join('species', 'speciment_herbarium.species_id', '=', 'species.id_species')
 			->join('genus', 'species.genus_id', '=', 'genus.id_genus')
 			->join('family', 'genus.family_id', '=', 'family.id_family')
 			->join('collector', 'speciment_herbarium.collector_id', '=', 'collector.id_collector')
 			->join('author_identification', 'speciment_herbarium.authorIdentification_id', '=', 'author_identification.id_author')
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
 			$fields = array_keys($constraints);
 			$index = 0;
 			foreach ($constraints as $constraint) {
 				if($constraint != null){
 					$query = $query->where($fields[$index], 'like', '%'.$constraint.'%');
 				}
 				$index++;
 			}
 			return $query->paginate(10);
 	}
}
