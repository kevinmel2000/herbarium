<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\InvasiveAS;
use App\Model\Family;
use App\Model\Genus;
use App\Model\Species;
use Illuminate\Support\Facades\DB;

class InvasiveViewController extends Controller
{
    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Family',
                        'progress' => $this->family(),
                        'color' => 'danger'
                ],
                [
                        'name' => 'Genus',
                        'progress' => $this->genus(),
                        'color' => 'primary'
                ],
                [
                        'name' => 'Species',
                        'progress' =>  $this->species(),
                        'color' => 'success'
                ],
        ];
        return view('dashboard_view/invasive/invasiveView')->with($data);
    }
        protected function family()
        {
                $speciment = InvasiveAS::select('species_id')->first();
                if($speciment != null){
                        $species = $speciment->species->genus->family->name_family;
                        $family= count($species);
                        return $family;
                }else
                        return 0;
        }

        protected function genus()
        {
                $speciment = InvasiveAS::select('species_id')->first();
                if($speciment != null){
                        $species = $speciment->species->genus->name_genus;
                        $genus= count($species);
                        return $genus;
                }else
                        return 0;
        }

        protected function species()
        {
                $speciment = InvasiveAS::select('species_id')->first();
                if($speciment != null){
                        $species = count($speciment->species->name_species);
                        return $species;
                }else
                        return 0;
        }
}
