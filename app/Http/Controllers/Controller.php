<?php

namespace App\Http\Controllers;

use Spipu\Html2Pdf\Html2Pdf;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function test()
    {
    	$formula = ['t', 's', '/', 'V'];

    	$values = ['V' => 27, 's' => 54];
    	$q = 't';

    	$result = [];
    	if ($formula[2] == '/') {
    		$qKey = array_search($q, $formula);

    		if ($qKey == 0) $result = $formula;

    		if ($qKey == 1) {
    			$newFormula = [$q];
	    		$newFormula[] = $formula[3];
	    		$newFormula[] = '/';
	    		$newFormula[] = $formula[0];

	    		$result = $newFormula;
    		}

    		if ($qKey == 3) {
    			$newFormula = [$q];
	    		$newFormula[] = $formula[1];
	    		$newFormula[] = '*';
	    		$newFormula[] = $formula[0];

	    		$result = $newFormula;
    		}
    	}
    	
    	return response($this->run($result, $values));
    }

    public function run($formula, $values)
    {
    	return eval('return '.$values[$formula[1]].$formula[2].$values[$formula[3]].';');
    }
}
