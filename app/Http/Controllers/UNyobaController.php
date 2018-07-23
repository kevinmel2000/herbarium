<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Collector;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class UNyobaController extends Controller
{
	public function index(){
				$herbariums = Collector::all();
			 //Get current page form url e.g. &page=6
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($herbariums);

        //Define how many items we want to be visible in each page
        $perPage = 5;

        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();

        //Create our paginator and pass it to the view
        $paginatedSearchResults= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);

		return view('/nyoba', ['herbariums'=> $paginatedSearchResults]);
	}

}
