<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Herbarium;
use App\Model\Family;
use App\Model\Genus;
use App\Model\Species;
use App\Model\AuthorIdent;
use App\Model\Collector;
use Illuminate\Support\Facades\DB;

class WeedViewController extends Controller
{
    public function index() {
        $data['tasks'] = [
                [
                        'name' => 'Family',
                        'progress' => $this->family()/1024*100,
                        'value' => $this->family(),
                        'color' => 'danger'
                ],
                [
                        'name' => 'Genus',
                        'progress' => $this->genus()/1024*100,
                        'value' => $this->genus(),
                        'color' => 'primary'
                ],
                [
                        'name' => 'Species',
                        'progress' =>  $this->species()/1024*100,
                        'value' =>  $this->species(),
                        'color' => 'success'
                ],
                [
                        'name' => 'Collector',
                        'progress' =>  $this->collector()/1024*100,
                        'value' =>  $this->collector(),
                        'color' => 'info'
                ],
                [
                        'name' => 'Determine',
                        'progress' =>  $this->determine()/1024*100,
                        'value' =>  $this->determine(),
                        'color' => 'warning'
                ]
        ];
        return view('dashboard_view/weed/weedView')->with($data);
    }


        protected function family()
        {
                $speciment = Family::count();

                return $speciment;
        }

        protected function genus()
        {
                   $speciment = Genus::count();

                return $speciment;
        }

        protected function species()
        {
                $speciment = Species::count();

                return $speciment;
        }

        protected function collector()
        {
               $speciment = Collector::distinct()->count('name_collector');

                return $speciment;
        }

        protected function determine()
        {
               $speciment = AuthorIdent::distinct()->count('name_author');
               return $speciment;
        }
}