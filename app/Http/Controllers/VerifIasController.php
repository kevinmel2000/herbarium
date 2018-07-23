<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\InvasiveAS;
use App\Model\verified;

class VerifIasController extends Controller
{
     
    public function __construct()
    {
        
    }

   
    public function index()
    {
        $speciment_ias = DB::table('speciment_ias')
        ->join('species', 'speciment_ias.species_id', '=', 'species.id_species')
        ->join('verified', 'speciment_ias.verifiedData_id', '=', 'verified.id_verified')
        ->select(
            'speciment_ias.*',
            'species.name_species',  
            'verified.status')
        ->paginate(5);
        return view('verified_ias/index', ['speciment_ias' => $speciment_ias]);
    }

    public function verified()
    {
       $speciment_ias = DB::table('speciment_ias')
        ->join('species', 'speciment_ias.species_id', '=', 'species.id_species')
        ->join('genus', 'species.genus_id', '=', 'genus.id_genus')
        ->join('family', 'genus.family_id', '=', 'family.id_family')
        ->join('control_ias', 'speciment_ias.control_id', '=', 'control_ias.id_controll')
        ->join('verified', 'speciment_ias.verifiedData_id', '=', 'verified.id_verified')
        ->select(
            'speciment_ias.*',
            'species.name_species', 
            'species.habitat', 
            'control_ias.chemical_ctrl', 
            'control_ias.manual_ctrl', 
            'control_ias.biologycal_ctrl', 
            'genus.name_genus', 
            'family.name_family', 
            'verified.status', 
            'species.species_synonim', 
            'species.origin_species', 
            'species.description_species', 
            'species.ecology')
        ->paginate(5);
        return view('verified_ias/verified', ['speciment_ias' => $speciment_ias]);
    }

    
    public function view($id_ias)
    {
        $speciment_ias = InvasiveAS::find($id_ias);
        if ($speciment_ias == null || count($speciment_ias) == 0) {
            return redirect()->intended('verified_ias/index');
        }

        return view('verified_ias/view',['speciment_ias' => $speciment_ias]);
    }

    public function verif($id_ias)
    {
        $speciment_ias = InvasiveAS::find($id_ias);
        $verif  = Verified::where('id_verified', $speciment_ias->verifiedData_id)->first();
        $verif    -> status                                          = "2";
        $verif    ->save();
        // dd($verif);
        return redirect()->action('VerifIasController@index');
    }

    public function search(Request $request) {
         $constraints = [
            'species_name' => $request['species_name'],
            'family_name' => $request['family_name'],
            'origin_species' => $request['origin_species'],
            'habitat' => $request['habitat']
            ];
       
       $speciment_ias = $this->doSearchingQuery($constraints);
       return view('/invasive/index', ['speciment_ias' => $speciment_ias, 'searchingVals' => $constraints]);
      
    }

    private function doSearchingQuery($constraints) {
        $query = Species::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
}
