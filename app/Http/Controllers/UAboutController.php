<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cornford\Googlmapper\Facades\MapperFacade as Mapper;

class UAboutController extends Controller
{
    public function index(){
       Mapper::map(-6.637090,  106.825869);
    	return view('user/about');
    }
}
