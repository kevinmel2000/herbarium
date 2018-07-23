<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Herbarium;
use App\Model\InvasiveAS;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weed       = $this->weed();
        $forest     = $this->forest();
        $lichen     = $this->lichen();
        $brio       = $this->brio();
        $ias        = $this->ias();
        return view('dashboard', ['weed' => $weed, 'forest' => $forest, 'lichen' => $lichen, 'brio' => $brio, 'ias' => $ias ] );
    }

    protected function weed()
    {
        $weed = Herbarium::where('type_herbarium', 1)->count();
        return $weed;
        
    }

    protected function forest()
    {
        $forest = Herbarium::where('type_herbarium', 2)->count();
        return  $forest;
    }

    protected function lichen()
    {
        $lichen = Herbarium::where('type_herbarium', 4)->count();
        return $lichen;
    }

    protected function brio()
    {
        $brio = Herbarium::where('type_herbarium', 3)->count();
        return $brio;
    }
    
    protected function ias()
    {
        $ias = InvasiveAS::select('id_ias')->count();
        return $ias;
    }
}
