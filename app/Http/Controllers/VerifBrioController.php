<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Model\Herbarium;
use App\Model\Verified;

class VerifBrioController extends Controller
{
     
    public function __construct()
    {
        
    }

   
    public function index()
    {
        $speciment_herbarium = DB::table('speciment_herbarium')
        ->join('species', 'speciment_herbarium.species_id', '=', 'species.id_species')
        ->join('verified', 'speciment_herbarium.verifiedData_id', '=', 'verified.id_verified')
        ->join('herbarium_type', 'speciment_herbarium.type_herbarium', '=', 'herbarium_type.id_type')
        ->join('herba_author', 'speciment_herbarium.authorIdentification_id', '=', 'herba_author.id_authorHerba')
         	->join('author_identification', 'herba_author.author1_id', '=', 'author_identification.id_author')
        ->select(
            'speciment_herbarium.*',
            'species.name_species',
            'herbarium_type.type',  
            'verified.status')
        ->paginate(5);
        return view('verified_herba/brioherba/index', ['speciment_herbarium' => $speciment_herbarium]);
    }

    public function verified()
    {
       $speciment_herbarium = DB::table('speciment_herbarium')
        ->join('species', 'speciment_herbarium.species_id', '=', 'species.id_species')
        ->join('genus', 'species.genus_id', '=', 'genus.id_genus')
        ->join('family', 'genus.family_id', '=', 'family.id_family')
        ->join('herbarium_type', 'speciment_herbarium.type_herbarium', '=', 'herbarium_type.id_type')
        ->join('venacular', 'species.vernacular_id', '=', 'venacular.id_venacular')
        ->join('verified', 'speciment_herbarium.verifiedData_id', '=', 'verified.id_verified')
        ->join('collector', 'speciment_herbarium.collector_id', '=', 'collector.id_collector')
        ->join('author_identification', 'speciment_herbarium.authorIdentification_id', '=', 'author_identification.id_author')
        ->select(
            'speciment_herbarium.*',
            'species.name_species', 
            'species.habitat', 
            'genus.name_genus', 
            'family.name_family',
            'venacular.venacular_name', 
            'verified.status', 
            'species.species_synonim', 
            'species.origin_species', 
            'species.description_species',
            'herbarium_type.type',
            'collector.name_collector', 
            'author_identification.name_author')
        ->paginate(5);
        return view('verified_herba/brioherba/verified', ['speciment_herbarium' => $speciment_herbarium]);
    }

    
    public function view($id_herba)
    {
        $speciment_herba = Herbarium::find($id_herba);
        if ($speciment_herba == null || count($speciment_herba) == 0) {
            return redirect()->intended('verified_herba/brioherba/index');
        }

        return view('verified_herba/brioherba/view',['speciment_herba' => $speciment_herba]);
    }

    public function verif($id_herba)
    {
        $speciment_herba = Herbarium::find($id_herba);
        $verif  = Verified::where('id_verified', $speciment_herba->verifiedData_id)->first();
        $verif    -> status                                          = "2";
        $verif    ->save();
        // dd($verif);
        return redirect()->action('VerifBrioController@index');
    }
     public function search(Request $request) {
         $constraints = [
            'species_name' => $request['species_name'],
            'verified' => $request['verified'],
           
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
