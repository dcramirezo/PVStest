<?php

namespace App\Http\Controllers;

use App\Loyalty;
use DB;
use Illuminate\Http\Request;

class LoyaltyController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('welcome');
    }

    public function show()
    {
	    $top_patrons = Loyalty::getTopTenPatrons();

	    $patron_games = DB::select(DB::raw('SELECT TOPTEN."Patron_id","Machines"."Game"
								FROM 
							    (SELECT "Patron_id", SUM(turnover) as Total_turnover 
							     FROM public."Loyalty" 
							     GROUP BY "Patron_id" 
							     ORDER BY SUM("turnover") desc 
							     Limit 10) as TOPTEN 
							     JOin "Loyalty" on "Loyalty"."Patron_id" = TOPTEN."Patron_id"
							     JOIN "Machines" on "Machines"."Floor_position"="Loyalty"."Floor_position"
							     Group by TOPTEN."Patron_id","Machines"."Game"
							     Order by TOPTEN."Patron_id", "Machines"."Game"'));
		//dd($patron_games);
		return view('welcome')->with('top_patrons', $top_patrons);
	}


	public function getTopTen(){

		return $top_patrons = Loyalty::getTopTenPatrons();
	}

	public function getGamesByPatron(int $patronId){

		$patron_games = DB::select(DB::raw('SELECT TOPTEN."Patron_id","Machines"."Game"
								FROM 
							    (SELECT "Patron_id", SUM(turnover) as Total_turnover 
							     FROM public."Loyalty"
							     WHERE "Patron_id"='.$patronId.' 
							     GROUP BY "Patron_id" 
							     ORDER BY SUM("turnover") desc 
							     Limit 10) as TOPTEN 
							     JOin "Loyalty" on "Loyalty"."Patron_id" = TOPTEN."Patron_id"
							     JOIN "Machines" on "Machines"."Floor_position"="Loyalty"."Floor_position"
							     Group by TOPTEN."Patron_id","Machines"."Game"
							     Order by TOPTEN."Patron_id", "Machines"."Game"'));		
		return $patron_games;
	}
}
