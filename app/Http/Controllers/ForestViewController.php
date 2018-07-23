<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Herbarium;
use App\Model\Family;
use App\Model\Genus;
use App\Model\Species;
use Illuminate\Support\Facades\DB;

class ForestViewController extends Controller
{
    protected function index()
    {
        $data['tasks'] = [
                [
                        'name' => 'Family',
                        'progress' => $this->family(),
                        'color' => 'danger'
                ],
                [
                        'name' => 'Genus',
                        'progress' =>$this->genus(),
                        'color' => 'primary'
                ],
                [
                        'name' => 'Species',
                        'progress' => $this->species(),
                        'color' => 'success'
                ],
                [
                        'name' => 'Collector',
                        'progress' => $this->collector(),
                        'color' => 'info'
                ],
                [
                        'name' => 'Determine',
                        'progress' => $this->determine(),
                        'color' => 'warning'
                ]
                ];
                return view('dashboard_view/forest/forestView')->with($data);
        }
        protected function family()
        {
                $speciment = Herbarium::where('type_herbarium', 2)->select('species_id')->first();
                if($speciment != null){
                        $species = $speciment->species->genus->family->name_family;
                        $family= count($species);
                        return $family;
                }else
                        return 0;
        }

        protected function genus()
        {
                $speciment = Herbarium::where('type_herbarium', 2)->select('species_id')->first();
                if($speciment != null){
                        $species = $speciment->species->genus->name_genus;
                        $genus= count($species);
                        return $genus;
                }else
                        return 0;
        }

        protected function species()
        {
                $speciment = Herbarium::where('type_herbarium', 2)->select('species_id')->first();
                if($speciment != null){
                        $species = count($speciment->species->name_species);
                        return $species;
                }else
                        return 0;
        }

        protected function collector()
        {
                $collect = Herbarium::where('type_herbarium', 2)->select('collector_id')->first();
                if($collect!= null){
                        $collector = count($collect);
                        return $collector;
                }else
                        return 0;
        }

        protected function determine()
        {
                $deter = Herbarium::where('type_herbarium', 2)->select('authorIdentification_id')->first();
                if($deter != null){
                        $determine =count($deter);
                        return $determine;
                }else
                        return 0;
        }
}
