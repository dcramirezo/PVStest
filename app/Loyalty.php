<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Loyalty extends Model
{
    protected $table = 'Loyalty';

    public static function getTopTenPatrons() {
    	$top_tenp = Loyalty::select('Patron_id', DB::raw('SUM(turnover) as total_turnover'))
    	->groupBy('Patron_id')
    	->orderBy(DB::raw('SUM(turnover)'), 'desc')
    	->limit(10)
    	->get();

    	return $top_tenp;
    }
}
