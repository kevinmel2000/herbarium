<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\InvasiveAS;
use App\Model\Species;
use App\Model\ControlIas;
use App\Model\Genus;
use App\Model\Family;
// use Yajra\Datatables\Facades\Datatables;

class UInvasiveController extends Controller
{
 	public function index(){
    $iass = DB::table('speciment_ias')
      ->join('species', 'speciment_ias.species_id', '=', 'species.id_species')
      ->join('genus', 'species.genus_id', '=', 'genus.id_genus')
      ->join('family', 'genus.family_id', '=', 'family.id_family')
      ->join('control_ias', 'speciment_ias.control_id', '=', 'control_ias.id_controll')
      ->join('characteristic_species', 'species.character_id', '=', 'characteristic_species.id_character')
      ->select('speciment_ias.*', 'species.name_species', 'species.habitat', 'control_ias.chemical_ctrl', 'control_ias.manual_ctrl',
     'control_ias.biologycal_ctrl', 'genus.name_genus', 'family.name_family', 'species.species_synonim', 'species.origin_species',
      'species.description_species', 'species.ecology', 'characteristic_species.picture_species',
				 'characteristic_species.picture_species2',
				 'characteristic_species.picture_species3',
				 'characteristic_species.picture_species4',
				 'characteristic_species.picture_species5',
				 'characteristic_species.picture_species6')
      ->paginate(10);

      $specimen = $this->specimen();
      $species = $this ->species();
      $family = $this->family();
       return view('user/invasive', ['iass' => $iass, 'spec' => $specimen, 'species' => $species, 'family'=> $family]);
 	}
  public function specimen(){
    $specimen = InvasiveAS::select('id_ias')->count();
    
    return $specimen;
  }
  public function species(){
    $species= InvasiveAS::select('species_id')->count();
    return $species;
  }
  public function family(){
    $ias =InvasiveAS::select('species_id')->first();
    $family = count($ias->species->genus->family->name_family);
    
    // $family = Genus::where('id_genus', $species)->select('family_id')->count();
    
    return $family;
  }


  public function search(Request $request) {
        $constraints = [
            'name_species' => $request['name_species'],
            'name_family' => $request['name_family'],
            'origin_species' => $request['origin_species'],
            'habitat' => $request['habitat']
            ];
       $specimen = $this->specimen();
       $species = $this ->species();
       $family = $this->family();
       $iass = $this->doSearchingQuery($constraints);
       return view('user/invasive', ['iass' => $iass, 'searchingVals' => $constraints, 'spec' => $specimen, 'species' => $species,
     'family'=> $family]);
    }

    private function doSearchingQuery($constraints) {
        $query =   DB::table('speciment_ias')
          ->join('species', 'speciment_ias.species_id', '=', 'species.id_species')
          ->join('genus', 'species.genus_id', '=', 'genus.id_genus')
          ->join('family', 'genus.family_id', '=', 'family.id_family')
          ->join('control_ias', 'speciment_ias.control_id', '=', 'control_ias.id_controll')
          ->join('characteristic_species', 'species.character_id', '=', 'characteristic_species.id_character')
          ->select('speciment_ias.*', 'species.name_species', 'species.habitat', 'control_ias.chemical_ctrl', 'control_ias.manual_ctrl',
         'control_ias.biologycal_ctrl', 'genus.name_genus', 'family.name_family', 'species.species_synonim', 'species.origin_species',
          'species.description_species', 'species.ecology', 'characteristic_species.picture_species',
    				 'characteristic_species.picture_species2',
    				 'characteristic_species.picture_species3',
    				 'characteristic_species.picture_species4',
    				 'characteristic_species.picture_species5',
    				 'characteristic_species.picture_species6');

        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(10);
    }

}
