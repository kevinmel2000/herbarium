<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Invasive;
use App\Model\Species;
use App\Model\Genus;
use App\Model\Family;
use App\Model\Collector;
use App\Model\CharacterSpecies;
use App\Model\ControlIas;
use App\Model\InvasiveAS;
use App\Model\Verified;
use App\User;
use App\Model\AuthorIdent;
use DateTime;

class InvasiveController extends Controller
{
    protected $redirectTo = '/invasive';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
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
    //dd($speciment_ias);
   return view('invasive/index', ['speciment_ias'=> $speciment_ias]);
    } 

    public function create()
    {
        return view('invasive/create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validateInput($request);
        
        $file = $request->file('image');
        $fileName = $file->getClientOriginalName();
      
        
        $request->file('image')->move("ias/",$fileName);

        if ($request->file('image2') != null){
            $file1 = $request->file('image2');
            $fileName1 = $file1->getClientOriginalName();
            $request->file('image2')->move("ias/",$fileName1);
        }else{ 
            $fileName1 =null;
        }

        if ($request->file('image3') != null){
            $file2 = $request->file('image3');
            $fileName2 = $file2->getClientOriginalName();
            $request->file('image3')->move("ias/",$fileName2);
        }else{ 
            $fileName2 =null;
        }

        if ($request->file('image4') != null){
            $file3 = $request->file('image4');
            $fileName3 = $file3->getClientOriginalName();
            $request->file('image4')->move("ias/",$fileName3);
        }else{ 
            $fileName3 =null;
        }

        if ($request->file('image5') != null){
            $file4 = $request->file('image5');
            $fileName4 = $file4->getClientOriginalName();
            $request->file('image5')->move("ias/",$fileName4);
        }else{ 
            $fileName4 =null;
        }

        if ($request->file('image6') != null){
             $file5 = $request->file('image6');
            $fileName5 = $file5->getClientOriginalName();
            $request->file('image6')->move("ias/",$fileName5);
        }else{ 
            $fileName5 =null;
        }

        $author   = new AuthorIdent;
        $author   -> name_author                                    = $request  ->input('author'); 
        
        $author   ->save();

        $charac   = new CharacterSpecies;
        $charac->picture_species  = $fileName;
        $charac->picture_species2 = $fileName1;
        $charac->picture_species3 = $fileName2;
        $charac->picture_species4 = $fileName3;
        $charac->picture_species5 = $fileName4;
        $charac->picture_species6 = $fileName5;
        $charac   -> save();

        $family   = new Family;
        $family   -> name_family                                    = $request   ->input('family');
        $family   -> save();

        $genus   = new Genus;
        $genus   -> name_genus                                      = $request    ->input('genus');
        $genus   -> family_id                                       = $family     ->id_family;
        $genus   -> save();

        $species   = new Species;
        $species   -> name_species                                  = $request   ->input('species');
        $species   -> species_synonim                               = $request   ->input('synonim');
        $species   -> origin_species                                = $request   ->input('origin');
        $species   -> habitat                                       = $request   ->input('invaded_habitat');
        $species   -> ecology                                       = $request   ->input('ecology');
        $species   -> description_species                           = $request   ->input('description');
        $species   -> genus_id                                      = $genus     ->id_genus;
        $species   -> character_id                                  = $charac     ->id_character; 
        $species   -> save(); 
        
        $ctrl   = new ControlIas;
        $ctrl    -> chemical_ctrl                                   = $request   ->input('chemical_ctrl');
        $ctrl    -> manual_ctrl                                     = $request   ->input('manual_ctrl');
        $ctrl    -> biologycal_ctrl                                 = $request   ->input('biological_ctrl');
        $ctrl    -> save();

        $verif  = new Verified;
        $verif    -> status                                          = "0";
        $verif    ->save();

        $ias   = new InvasiveAS;
        $ias     -> common_name                                     = $request   ->input('common_name');
        $ias     -> distribution                                    = $request   ->input('distribution');
        $ias     -> prevention                                      = $request   ->input('prevention');
        $ias     -> utilization                                     = $request   ->input('utilization');
        $ias     -> risk_analisis                                   = $request   ->input('risk_analisis');
        $ias     -> contact_person                                  = $request   ->input('contact');
        $ias     -> control_id                                      = $ctrl      ->id_controll;
        $ias     -> species_id                                      = $species   ->id_species;
        $ias     -> reference                                       = $request   ->input('reference');   
        $ias     -> verifiedData_id                                 = $verif     ->id_verified;
        $ias     -> user_id                                         = $request   ->input('user');
        $ias     -> author_id                                       = $author    ->id_author;
        $ias     -> save();
        
        // dd($request);      

        return redirect()->intended('/invasive');
    }

    public function show($id_ias)
    {
        $speciment_ias = InvasiveAS::find($id_ias);
        if ($speciment_ias == null || count($speciment_ias) == 0) {
            return redirect()->intended('/invasive');
        }

        return view('invasive/show', ['speciment_ias' => $speciment_ias]);
    }
 
    public function edit($id_ias)
    {
        $speciment_ias = InvasiveAS::find($id_ias);
        if ($speciment_ias == null || count($speciment_ias) == 0) {
            return redirect()->intended('/invasive');
        }

        return view('invasive/edit', ['speciment_ias' => $speciment_ias]);
    }

    public function update(Request $request, $id_ias)
    {
        $constraints = [
            'family'            => 'required|max:500',
            'genus'             => 'required|max:500',
            'species'           => 'required|max:500',
            'synonim'           => 'max:10000',
            'origin'            => 'max:500',
            'invaded_habitat'   => 'max:10000',
            'ecology'           => 'max:10000',
            'description'       => 'max:15000',
            'chemical_ctrl'     => 'max:10000',
            'manual_ctrl'       => 'max:10000',
            'biological_ctrl'   => 'max:10000',
            'common_name'       => 'max:500',
            'distribution'      => 'max:10000',
            'prevention'        => 'max:10000',
            'utilization'       => 'max:10000',
            'risk_analisis'     => 'max:15000',
            'contact'           => 'max:10000',
            'reference'         => 'max:15000',
            'gambar[1]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[2]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[3]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[4]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[5]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[6]'         => 'image|mimes:jpeg,bmp,png,jpg',
            ];

        $this->validate($request, $constraints);

        $speciment_ias  = InvasiveAS::Find($id_ias);
        $speciment_ias  -> common_name                        = $request   ->input('common_name');
        $speciment_ias  -> distribution                       = $request   ->input('distribution');
        $speciment_ias  -> prevention                         = $request   ->input('prevention');
        $speciment_ias  -> utilization                        = $request   ->input('utilization');
        $speciment_ias  -> risk_analisis                      = $request   ->input('risk_analisis');
        $speciment_ias  -> contact_person                     = $request   ->input('contact');
        $speciment_ias  -> reference                          = $request   ->input('reference');
        $speciment_ias  -> save();

        $author     = AuthorIdent::where('id_author','=', $speciment_ias->author_id)->first();
        $author     -> name_author                            = $request  ->input('author'); 
        $author     -> save();

        $species    = Species::where('id_species', '=', $speciment_ias->species_id)->first();
        $species   -> name_species                            = $request   ->input('species');
        $species   -> species_synonim                         = $request   ->input('synonim');
        $species   -> origin_species                          = $request   ->input('origin');
        $species   -> habitat                                 = $request   ->input('invaded_habitat');
        $species   -> ecology                                 = $request   ->input('ecology');
        $species   -> description_species                     = $request   ->input('description');
        $species   -> save();

        $ctrl    = ControlIas::where('id_controll', '=', $speciment_ias->control_id)->first();
        $ctrl    -> chemical_ctrl                             = $request   ->input('chemical_ctrl');
        $ctrl    -> manual_ctrl                               = $request   ->input('manual_ctrl');
        $ctrl    -> biologycal_ctrl                           = $request   ->input('biological_ctrl');
        $ctrl    -> save();

        if ($request->file('image') != null){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $request->file('image')->move("ias/",$fileName);
        }else{
            $fileName =null;
        }
        if ($request->file('image2') != null){
            $file1 = $request->file('image2');
            $fileName1 = $file1->getClientOriginalName();
            $request->file('image2')->move("ias/",$fileName1);
        }else{ 
            $fileName1 =null;
        }

        if ($request->file('image3') != null){
            $file2 = $request->file('image3');
            $fileName2 = $file2->getClientOriginalName();
            $request->file('image3')->move("ias/",$fileName2);
        }else{ 
            $fileName2 =null;
        }

        if ($request->file('image4') != null){
             $file3 = $request->file('image4');
            $fileName3 = $file3->getClientOriginalName();
            $request->file('image4')->move("ias/",$fileName3);
        }else{ 
            $fileName3 =null;
        }

        if ($request->file('image5') != null){
              $file4 = $request->file('image5');
            $fileName4 = $file4->getClientOriginalName();
            $request->file('image5')->move("ias/",$fileName4);
        }else{ 
            $fileName4 =null;
        }

        if ($request->file('image6') != null){
             $file5 = $request->file('image6');
            $fileName5 = $file5->getClientOriginalName();
            $request->file('image6')->move("ias/",$fileName5);
        }else{ 
            $fileName5 =null;
        }

        $charac   = CharacterSpecies::where('id_character', '=', $species->character_id)->first();
        $charac   -> picture_species                                = $fileName;
        $charac   -> picture_species2                               = $fileName1;
        $charac   -> picture_species3                               = $fileName2;
        $charac   -> picture_species4                               = $fileName3;
        $charac   -> picture_species5                               = $fileName4;
        $charac   -> picture_species6                               = $fileName5;
        $charac   -> save();

        $genus   = Genus::where('id_genus', '=', $species->genus_id)->first();
        $genus   -> name_genus                                = $request   ->input('genus');
        $genus   -> save();
        
        $family   = Family::where('id_family', '=', $genus->family_id)->first();
        $family   -> name_family                              = $request    ->input('family');
        $family   -> save();
        
        return redirect()->intended('/invasive');
    }

    public function destroy($id_ias)
    {
        $speciment_ias = InvasiveAS::where('id_ias', $id_ias);
        if ($speciment_ias == null || count($speciment_ias) == 0) {
            return redirect()->intended('/invasive');
        }
         $speciment_ias  ->delete();
        
         return redirect()->intended('/invasive')->with(['message'=> 'Successfully deleted!!']);
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

    public function specimen(){
        $specimen = InvasiveAS::select('id_ias')->count();
        return $specimen;
    }
    public function species(){
        $species = Species::select('id_species')->count();
        return $species;
    }
    public function family(){
        $family = Family::select('id_family')->count();
        return $family;
    }
    
    
    private function validateInput($request) {
        $this->validate($request, [
            'family'            => 'required|max:500',
            'genus'             => 'required|max:500',
            'species'           => 'required|max:500',
            'synonim'           => 'max:10000',
            'origin'            => 'max:500',
            'invaded_habitat'   => 'max:10000',
            'ecology'           => 'max:10000',
            'description'       => 'max:15000',
            'chemical_ctrl'     => 'max:10000',
            'manual_ctrl'       => 'max:10000',
            'biological_ctrl'   => 'max:10000',
            'common_name'       => 'max:500',
            'distribution'      => 'max:10000',
            'prevention'        => 'max:10000',
            'utilization'       => 'max:10000',
            'risk_analisis'     => 'max:15000',
            'contact'           => 'max:10000',
            'reference'         => 'max:15000',
            'gambar[1]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[2]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[3]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[4]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[5]'         => 'image|mimes:jpeg,bmp,png,jpg',
            'gambar[6]'         => 'image|mimes:jpeg,bmp,png,jpg',
        ]);
    }
}
