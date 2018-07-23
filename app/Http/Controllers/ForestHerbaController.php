<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Routing\ResponseFactory;
use Intervention\Image\ImageManagerStatic as Image;
use App\Model\Collector;
use App\Model\AuthorIdent;
use App\Model\State;
use App\Model\Province;
use App\Model\District;
use App\Model\City;
use App\Model\Location;
use App\Model\Herbarium;
use App\Model\Species;
use App\Model\CharacterSpecies;
use App\Model\HerbariumType;
use App\Model\Duplicate;
use App\Model\Family;
use App\Model\Genus;
use App\Model\Vernacular;
use App\Model\Verified;
use App\Model\AuthorNew;
use View;
use DateTime;

class ForestHerbaController extends Controller
{
    protected function index()
    {
        $speciment_herbarium = DB::table('speciment_herbarium')
         ->join('species', 'speciment_herbarium.species_id', '=', 'species.id_species')
         ->join('users', 'speciment_herbarium.user_id', '=', 'users.id')
         ->join('verified', 'speciment_herbarium.verifiedData_id', '=', 'verified.id_verified')
         ->join('collector', 'speciment_herbarium.collector_id', '=', 'collector.id_collector')
         ->join('herbarium_type', 'speciment_herbarium.type_herbarium', '=', 'herbarium_type.id_type')
         ->join('herba_author', 'speciment_herbarium.authorIdentification_id', '=', 'herba_author.id_authorHerba')
         ->join('author_identification', 'herba_author.author1_id', '=', 'author_identification.id_author')
         ->select('speciment_herbarium.*', 'species.name_species', 'users.user_type', 'herbarium_type.type',  'collector.name_collector', 'author_identification.name_author', 'verified.status')
         ->paginate(5);
        // dd($speciment_herbarium);
        return view('herbarium/forestherba/index', ['speciment_herbarium'=> $speciment_herbarium]);
    }

    protected function create()
    {
        return view('herbarium/forestherba/createAuthor');
    }

    public function createnext(Request $request)
     {
        // $this->validateInput($request);

        $collect = new Collector;
        $collect -> name_collector                     = $request -> input('name_collector');
        $collect -> tim_collector                      = $request -> input('tim_collector');
        $collect -> date_collection                    = $request -> input('date_collector');
        $collect -> number_collection                  = $request -> input('number_collector');   
        $collect -> save();

        $author = new AuthorIdent;
        $author  -> name_author                       = $request -> input('name_author');
        $author  -> email_author                      = $request -> input('email_author');
        $author  -> phone_author                      = $request -> input('phone_author');
        $author  -> date_ident                        = $request -> input('date_ident');
        $author  -> agency                            = $request -> input('agency');
        $author  -> save();

        if ($request->input('name_author2') != null){
            $author2 = new AuthorIdent;
            $author2  -> name_author                       = $request -> input('name_author2');
            $author2  -> email_author                      = $request -> input('email_author2');
            $author2  -> phone_author                      = $request -> input('phone_author2');
            $author2  -> date_ident                        = $request -> input('date_ident2');
            $author2  -> agency                            = $request -> input('agency2');
            $author2  -> save();
        }else{
            $author2 = null;
        }
        if ($request->input('name_author3') != null){
            $author3 = new AuthorIdent;
            $author3  -> name_author                       = $request -> input('name_author3');
            $author3  -> email_author                      = $request -> input('email_author3');
            $author3  -> phone_author                      = $request -> input('phone_author3');
            $author3  -> date_ident                        = $request -> input('date_ident3');
            $author3  -> agency                            = $request -> input('agency3');
            $author3  -> save();
        }else{
            $author3 = null;
        }
        if ($request->input('name_author4') != null){
            $author4 = new AuthorIdent;
            $author4  -> name_author                       = $request -> input('name_author4');
            $author4  -> email_author                      = $request -> input('email_author4');
            $author4  -> phone_author                      = $request -> input('phone_author4');
            $author4  -> date_ident                        = $request -> input('date_ident4');
            $author4  -> agency                            = $request -> input('agency4');
            $author4  -> save();
        }else{
            $author4 = null;
        } 
        if ($request->input('name_author5') != null){
            $author5 = new AuthorIdent;
            $author5  -> name_author                       = $request -> input('name_author5');
            $author5  -> email_author                      = $request -> input('email_author5');
            $author5  -> phone_author                      = $request -> input('phone_author5');
            $author5  -> date_ident                        = $request -> input('date_ident5');
            $author5  -> agency                            = $request -> input('agency5');
            $author5  -> save();
        }else{
            $author5 = null;
        }
        if ($request->input('name_author6') != null){
            $author6 = new AuthorIdent;
            $author6  -> name_author                       = $request -> input('name_author6');
            $author6  -> email_author                      = $request -> input('email_author6');
            $author6  -> phone_author                      = $request -> input('phone_author6');
            $author6  -> date_ident                        = $request -> input('date_ident6');
            $author6  -> agency                            = $request -> input('agency6');
            $author6  -> save();
        }else{
            $author6 = null;
        }

        $allAuthor = new AuthorNew;
        $allAuthor -> author1_id                            =$author    ->id_author;
        if($author2 != null)
            $allAuthor -> author2_id                        =$author2   ->id_author;
        if($author3 != null)
            $allAuthor -> autor3_id                         =$author3   ->id_author;
        if($author4 != null)
            $allAuthor -> autor4_id                         =$author4   ->id_author;
        if($author5 != null)
            $allAuthor -> autor5_id                         =$author5   ->id_author;
        if($author6 != null)
            $allAuthor -> autor6_id                         =$author6   ->id_author;
        $allAuthor -> save();
        
        $location = new Location;
        $location -> latitude                           = $request -> input('latitude');
        $location -> longitude                          = $request -> input('longitude');
        $location -> atitude                            = $request -> input('atitude');
        $location -> district_id                        = $request -> input('id_district');
        $location -> vilage                             = $request -> input('name_vilage');
        $location -> save();

        $data   =['collect'=>$collect->id_collector, 'author'=>$allAuthor->id_authorHerba, 'location'=>$location->id_location];
        return view('/herbarium/forestherba/createSpecimen', ['data' => $data]);
     }
   


    public function store(Request $request)
    {
       
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

        $charac   = new CharacterSpecies;
        $charac   -> picture_species                                = $fileName;
        $charac   -> picture_species2                               = $fileName1;
        $charac   -> picture_species3                               = $fileName2;
        $charac   -> picture_species4                               = $fileName3;
        $charac   -> picture_species5                               = $fileName4;
        $charac   -> picture_species6                               = $fileName5;
        $charac   -> description1                                   = $request    ->input('pic_dest');
        $charac   -> description2                                   = $request    ->input('pic_dest2');
        $charac   -> description3                                   = $request    ->input('pic_dest3');
        $charac   -> description4                                   = $request    ->input('pic_dest4');
        $charac   -> description5                                   = $request    ->input('pic_dest5');
        $charac   -> description6                                   = $request    ->input('pic_dest6');
        $charac   -> save();
        
        $dupt = new Duplicate;
        $dupt -> dupt_form                                  = $request     ->input('dupt_form');
        $dupt -> dupt_send                                  = $request     ->input('dupt_send');
        $dupt -> number_form                                = $request     ->input('num_form');
        $dupt -> number_send                                = $request     ->input('num_send');
        $dupt -> number_duptAll                             = $request     ->input('num_dupt');
        $dupt -> save();

        $family = new Family;
        $family -> name_family                              = $request     ->input('family');
        $family -> save();
        
        $genus = new Genus;
        $genus -> name_genus                                = $request     ->input('genus');
        $genus -> family_id                                 = $family      ->id_family;
        $genus -> save();
        
        
        $vena = new Vernacular;
        $vena -> venacular_name                             = $request     ->input('venacular_name');
        $vena -> save();

        $species = new Species;
        $species -> name_species                               = $request     ->input('species');
        $species -> subspecies                                 = $request     ->input('subspecies');
        $species -> variety                                    = $request     ->input('variety');
        $species -> origin_species                             = $request     ->input('origin_species');
        $species -> species_synonim                            = $request     ->input('species_synonim');
        $species -> vernacular_id                              = $vena        ->id_venacular;
        $species -> description_species                        = $request     ->input('description_species');
        $species -> genus_id                                   = $genus       ->id_genus;
        $species -> character_id                               = $charac      ->id_character;
        $species -> save();
    
        $verif  = new Verified;
        $verif  -> status                                          = "0";
        $verif  ->save();

        $herbarium = new Herbarium;
        $herbarium -> label                                       = $request    ->input('label_weed');
        $herbarium -> duplicate_id                                = $dupt       ->id_dupt;
        $herbarium -> notes                                       = $request    ->input('notes');         
        $herbarium -> species_id                                  = $species    ->id_species;
        $herbarium -> type_herbarium                              = "2";
        $herbarium -> verifiedData_id                             = $verif ->id_verified;
        $herbarium -> location_id                                 = $request    ->input('data1');
        $herbarium -> collector_id                                = $request    ->input('data2');
        $herbarium -> authorIdentification_id                     = $request    ->input('data3');
        $herbarium -> user_id                                     = $request    ->input('user');
        $herbarium  -> save();
        
        return redirect()-> intended('/herbarium-management/forestherba');
    }

    
    protected function edit($id_herba)
    {
        $speciment_herbarium = Herbarium::find($id_herba);
        if ($speciment_herbarium == null || count($speciment_herbarium) == 0) {
            return redirect()->intended('/herbarium-management/forestherba');
        }
        
        $state = $speciment_herbarium->location->districts->city->prov->state->orderBy('name', 'asc')->get();
        return view('herbarium/forestherba/edit', ['speciment_herbarium' => $speciment_herbarium, 'state' => $state]);
    }

     public function update(Request $request, $id_herba)
    {
       
        // dd($request);
        $speciment_herba = Herbarium::Find($id_herba);
        
        $collect = Collector::where('id_collector', $speciment_herba->collector_id)->first();
        $collect -> name_collector                     = $request -> input('name_collector');
        $collect -> tim_collector                      = $request -> input('tim_collector');
        $collect -> date_collection                    = $request -> input('date_collector');
        $collect -> number_collection                  = $request -> input('number_collector');   
        $collect -> save();

        $allAuthor = AuthorNew::where('id_authorHerba', $speciment_herba->authorIdentification_id)->first();
        $allAuthor -> save();

        $author = AuthorIdent::where('id_author', $speciment_herba->determine->author1_id)->first();
        $author  -> name_author                       = $request -> input('name_author');
        $author  -> email_author                      = $request -> input('email_author');
        $author  -> phone_author                      = $request -> input('phone_author');
        $author  -> date_ident                        = $request -> input('date_ident');
        $author  -> agency                            = $request -> input('agency');
        $author  -> save();

        if ($request->input('name_author2') != null){
            $author2 = AuthorIdent::where('id_author', $speciment_herba->determine->author2_id)->first();
            $author2  -> name_author                       = $request -> input('name_author2');
            $author2  -> email_author                      = $request -> input('email_author2');
            $author2  -> phone_author                      = $request -> input('phone_author2');
            $author2  -> date_ident                        = $request -> input('date_ident2');
            $author2  -> agency                            = $request -> input('agency2');
            $author2  -> save();
        }else{
            $author2 = null;
        }
        if ($request->input('name_author3') != null){
            $author3 = AuthorIdent::where('id_author', $speciment_herba->determine->author3_id)->first();
            $author3  -> name_author                       = $request -> input('name_author3');
            $author3  -> email_author                      = $request -> input('email_author3');
            $author3  -> phone_author                      = $request -> input('phone_author3');
            $author3  -> date_ident                        = $request -> input('date_ident3');
            $author3  -> agency                            = $request -> input('agency3');
            $author3  -> save();
        }else{
            $author3 = null;
        }
        if ($request->input('name_author4') != null){
            $author4 = AuthorIdent::where('id_author', $speciment_herba->determine->author4_id)->first();
            $author4  -> name_author                       = $request -> input('name_author4');
            $author4  -> email_author                      = $request -> input('email_author4');
            $author4  -> phone_author                      = $request -> input('phone_author4');
            $author4  -> date_ident                        = $request -> input('date_ident4');
            $author4  -> agency                            = $request -> input('agency4');
            $author4  -> save();
        }else{
            $author4 = null;
        } 
        if ($request->input('name_author5') != null){
            $author5 = AuthorIdent::where('id_author', $speciment_herba->determine->author5_id)->first();
            $author5  -> name_author                       = $request -> input('name_author5');
            $author5  -> email_author                      = $request -> input('email_author5');
            $author5  -> phone_author                      = $request -> input('phone_author5');
            $author5  -> date_ident                        = $request -> input('date_ident5');
            $author5  -> agency                            = $request -> input('agency5');
            $author5  -> save();
        }else{
            $author5 = null;
        }
        if ($request->input('name_author6') != null){
            $author6 = AuthorIdent::where('id_author', $speciment_herba->determine->author6_id)->first();
            $author6  -> name_author                       = $request -> input('name_author6');
            $author6  -> email_author                      = $request -> input('email_author6');
            $author6  -> phone_author                      = $request -> input('phone_author6');
            $author6  -> date_ident                        = $request -> input('date_ident6');
            $author6  -> agency                            = $request -> input('agency6');
            $author6  -> save();
        }else{
            $author6 = null;
        }

        $author = AuthorIdent::where('id_author', $speciment_herba->authorIdentification_id)->first();
        $author  -> name_author                       = $request -> input('name_author');
        $author  -> email_author                      = $request -> input('email_author');
        $author  -> phone_author                      = $request -> input('phone_author');
        $author  -> date_ident                        = $request -> input('date_ident');
        $author  -> agency                            = $request -> input('agency');
        $author  -> save();
        
        $location = Location::where('id_location', $speciment_herba->location_id)->first();
        $location -> latitude                           = $request -> input('latitude');
        $location -> longitude                          = $request -> input('longitude');
        $location -> atitude                            = $request -> input('atitude');
        $location -> district_id                        = $request -> input('id_district');
        $location -> vilage                             = $request -> input('name_vilage');
        // dd($location);
        $location -> save();
        $data =['collect'=>$collect->id_collector, 'author'=>$author->id_author, 'location'=>$location->id_location];
        return view('/herbarium/forestherba/edits',['speciment_herbarium' => $speciment_herba, 'data'=>$data]);
    }

    protected function updatestep(Request $request, $id_herba)
    {
        // dd($request);
        $speciment_herba  = Herbarium::Find($id_herba);
        $speciment_herba -> label                                       = $request    ->input('label_weed');
        $speciment_herba -> notes                                       = $request    ->input('notes');      
        $speciment_herba -> location_id                                 = $request    ->input('data1');
        $speciment_herba -> collector_id                                = $request    ->input('data2');
        $speciment_herba -> authorIdentification_id                     = $request    ->input('data3');
        $speciment_herba -> user_id                                     = $request    ->input('user');
        $speciment_herba -> save();
        
        $species    = Species::where('id_species', '=', $speciment_herba->species_id)->first();
        $species   -> name_species                            = $request   ->input('species');
        $species   -> species_synonim                         = $request   ->input('synonim');
        $species   -> origin_species                          = $request   ->input('origin');
        $species   -> description_species                     = $request   ->input('description');
        $species   -> subspecies                              = $request     ->input('subspecies');
        $species   -> variety                                 = $request     ->input('variety');
        $species   -> save();
        
        $vena       = Vernacular::where('id_venacular', '=', $species->vernacular_id)->first();
        $vena       -> venacular_name                         = $request    ->input('venacular_name'); 
        $vena       -> save();

        $dupt = Duplicate::where('id_dupt', '=',$speciment_herba->duplicate_id)->first();
        $dupt -> dupt_form                                  = $request     ->input('dupt_form');
        $dupt -> dupt_send                                  = $request     ->input('dupt_send');
        $dupt -> number_form                                = $request     ->input('num_form');
        $dupt -> number_send                                = $request     ->input('num_send');
        $dupt -> number_duptAll                             = $request     ->input('num_dupt');
        $dupt -> save();
        // dd($dupt);

        $genus   = Genus::where('id_genus', '=', $species->genus_id)->first();
        $genus   -> name_genus                                = $request   ->input('genus');
        $genus   -> save();
        
        $family   = Family::where('id_family', '=', $genus->family_id)->first();
        $family   -> name_family                              = $request    ->input('family');
        $family   -> save();

        if ($request->file('image2') != null){
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $request->file('image')->move("ias/",$fileName);
        }else{
            $fileName =null;
        }

        if ($request->file('image2') != null){
            $file1 = $request->file('image2');
            $fileName1 = $file1->getClientOriginalName();
            $request->file('image2')->move("herba/",$fileName1);
        }else{ 
            $fileName1 =null;
        }

        if ($request->file('image3') != null){
            $file2 = $request->file('image3');
            $fileName2 = $file2->getClientOriginalName();
            $request->file('image3')->move("herba/",$fileName2);
        }else{ 
            $fileName2 =null;
        }

        if ($request->file('image4') != null){
             $file3 = $request->file('image4');
            $fileName3 = $file3->getClientOriginalName();
            $request->file('image4')->move("herba/",$fileName3);
        }else{ 
            $fileName3 =null;
        }

        if ($request->file('image5') != null){
              $file4 = $request->file('image5');
            $fileName4 = $file4->getClientOriginalName();
            $request->file('image5')->move("herba/",$fileName4);
        }else{ 
            $fileName4 =null;
        }

        if ($request->file('image6') != null){
            $file5 = $request->file('image6');
            $fileName5 = $file5->getClientOriginalName();
            $request->file('image6')->move("herba/",$fileName5);
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
        $charac   -> description1                                   = $request    ->input('pic_dest');
        $charac   -> description2                                   = $request    ->input('pic_dest2');
        $charac   -> description3                                   = $request    ->input('pic_dest3');
        $charac   -> description4                                   = $request    ->input('pic_dest4');
        $charac   -> description5                                   = $request    ->input('pic_dest5');
        $charac   -> description6                                   = $request    ->input('pic_dest6');
        $charac   -> save();

       
        return redirect()->intended('/herbarium-management/forestherba');
    }
        
    protected function show($id_herba)
    {
        //  dd($id_herba);
        $speciment_herba= Herbarium::find($id_herba);
        
        return view('herbarium/forestherba/show', ['speciment_herbarium' => $speciment_herba]);
    }
    
    public function destroy($id_herba)
    {
        $speciment_herba = Herbarium::where('id_herbarium', $id_herba);
        if ($speciment_herba == null || count($speciment_herba) == 0) {
            return redirect()->intended('/herbarium-management/forestherba');
        }
         $speciment_herba  ->delete();
        
         return redirect()->intended('/herbarium-management/forestherba')->with(['message'=> 'Successfully deleted!!']);
    }

    public function search(Request $request) {
        $constraints = [
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'department' => $request['department']
            ];

       $users = $this->doSearchingQuery($constraints);
       return view('users-mgmt/index', ['users' => $users, 'searchingVals' => $constraints]);
    }

    public function destination(Request $request){
        $state = State::orderBy('name', 'asc')->get();   
        return view('herbarium.forestherba.createAuthor', ['state' => $state]);
       // dd($request);
    }

    public function findProv(Request $request)
    {
        $data= Province::select('name', 'id_prov')
            ->orderBy('name', 'asc')
            ->where('state_id', $request->id)
            ->get();
        return response()->json($data);
       // dd($request);
    }

    public function findCity(Request $request)
    {
        $data1= City::select('name', 'id_city')
            ->orderBy('name', 'asc')
            ->where('prov_id', $request->id_prov)
            ->get();
        return response()->json($data1);
       // dd($request);
    }

    public function findDists(Request $request)
    {
        $data2= District::select('name', 'id_districts')
            ->orderBy('name', 'asc')
            ->where('city_id', $request->id_citys)
            ->get();
        return response()->json($data2);
       // dd($request);
    }
}

