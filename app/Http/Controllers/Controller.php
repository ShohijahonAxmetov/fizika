<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $globalCounter = 0;
    protected $globalActions = [];

    public function start()
    {
    	$params = $this->getAllParams();

    	return view('start', [
    		'params' => $params
    	]);
    }

    public function test(Request $request)
    {
    	$values = $this->getValues($request);
    	$q = $this->getQ($request);

    	$formula = $this->resolution($q);

    	// dd($formula);
    	$tempActions = []; // bajarilish tartibi va virajeniyalar massivi

    	//1-QADAM (SKOBKALAR)
    	// nayti isoxranit otkrivayushie skobki
    	$beginSkobki = [];
    	foreach ($formula as $paramKey => $param) {
    		if ($param == '(') $beginSkobki[] = $paramKey;
    	}

    	// esli otkrivayushie skobki == 1, naydem virajenie
    // 	if (count($beginSkobki) == 1) {
    // 		for($i=$beginSkobki[0]+1; $i<count($formula)-1; $i++) {
    // 			if ($formula[$i] == ')') break;
				
				// $tempActions[] = $formula[$i];
    // 		}
    // 		$this->globalActions[] = $tempActions;
    // 	} else {
    		foreach ($beginSkobki as $skobki) {
				for($i=$skobki+1; $i<count($formula)-1; $i++) {
	    			if ($formula[$i] == ')') break;
					
					$tempActions[] = $formula[$i];
	    		}
	    		$this->globalActions[] = $tempActions;	
    		// }
    	// }

    	dd($this->globalActions);

    	// virajeniyani harflar bilan belgilab ketamiz
    	$unsetItems = []; // [['key' => 1, 'length' => 3]]
		foreach ($formula as $paramKey => $param) {
			$tempParam = $param;
			$tempCheck = [];
			for ($i=0; $i<count($tempActions); $i++) {
				if ($tempParam == $tempActions[$i]) {
					$tempParam = $formula[$paramKey+$i+1];
					$tempCheck[] = $i;
				}
    		}

    		if (count($tempCheck) == count($tempActions)) {
    			$unsetItems[] = ['key' => $paramKey-1, 'length' => count($tempActions)+2];
    		}
    	}

    	dd($this->globalActions);

    	$this->unsetItems($formula, $unsetItems);
    	
    	$result = $this->process($formula, $q);

    	$answer = $this->run($result, $values);
    	
    	return response($answer);
    }

    public function run($formula, $values)
    {
    	// dd($formula);
    	return eval('return '.$values[$formula[1]].$formula[2].$values[$formula[3]].';');
    }

    public function getValues(Request $request)
    {
    	// ['V' => 27, 's' => 54];
    	$result = [];
    	for ($i=0; $i<count($request->input('vars')); $i++) {
    		$result[$request->input('vars')[$i]] = $request->input('vars_values')[$i];
    	}

    	return $result;
    }

    public function getQ(Request $request)
    {
    	// t
    	return $request->input('q');
    }

    public function process($formula, $q)
    {
    	$result = [];
    	switch ($formula[2]) {
    		case '/':
    			$qKey = array_search($q, $formula);

	    		if ($qKey == 0) $result = $formula;

	    		if ($qKey == 1) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[3];
		    		$newFormula[] = '*';
		    		$newFormula[] = $formula[0];

		    		$result = $newFormula;
	    		}

	    		if ($qKey == 3) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[1];
		    		$newFormula[] = '/';
		    		$newFormula[] = $formula[0];

		    		$result = $newFormula;
	    		}

    			break;
    		
    		case '*':
    			$qKey = array_search($q, $formula);

	    		if ($qKey == 0) $result = $formula;

	    		if ($qKey == 1) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[0];
		    		$newFormula[] = '/';
		    		$newFormula[] = $formula[3];

		    		$result = $newFormula;
	    		}

	    		if ($qKey == 3) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[0];
		    		$newFormula[] = '/';
		    		$newFormula[] = $formula[1];

		    		$result = $newFormula;
	    		}

    			break;

			case '+':
    			$qKey = array_search($q, $formula);

	    		if ($qKey == 0) $result = $formula;

	    		if ($qKey == 1) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[0];
		    		$newFormula[] = '-';
		    		$newFormula[] = $formula[3];

		    		$result = $newFormula;
	    		}

	    		if ($qKey == 3) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[0];
		    		$newFormula[] = '-';
		    		$newFormula[] = $formula[1];

		    		$result = $newFormula;
	    		}

    			break;

			case '-':
    			$qKey = array_search($q, $formula);

	    		if ($qKey == 0) $result = $formula;

	    		if ($qKey == 1) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[0];
		    		$newFormula[] = '+';
		    		$newFormula[] = $formula[3];

		    		$result = $newFormula;
	    		}

	    		if ($qKey == 3) {
	    			$newFormula = [$q];
		    		$newFormula[] = $formula[1];
		    		$newFormula[] = '-';
		    		$newFormula[] = $formula[0];

		    		$result = $newFormula;
	    		}

    			break;
    	}

    	return $result;
    }

    public function resolution($q)
    {
    	$formulalar = $this->getFormulalar();

    	foreach ($formulalar as $key => $formula) {
    		if (in_array($q, $formula)) return $formula;
    	}

    	return null;
    }

    public function getFormulalar()
    {
    	return [
    		// ['t', 's', '/', 'V'],
    		['s', 'V', '*', 't'],
    		['A', 'a', '*', 'b', '*', '(', 'c', '+', 'e', ')', '/', 'd', '+', '(', 'g', '-', 'n', ')', '*', 'm'],
    	];
    }

    public function getAllParams()
    {
    	$formulalar = $this->getFormulalar();
    	$result = [];
    	foreach ($formulalar as $formula) {
    		foreach ($formula as $key => $value) {
    			if (in_array($value, ['+', '-', '*', '/', '(', ')'])) continue;

    			if (!in_array($value, $result)) $result[] = $value;
    		}
    	}

    	return $result;
    }

    public function unsetItems($formula, $unsetItems)
    {
    	$result = $formula;

    	foreach ($unsetItems as $item) {
    		for ($i=$item['key']; $i<$item['length']+$item['key']; $i++) {
    			unset($result[$i]);
    		}

    		$result[$item['key']] = 'temp'.$this->globalCounter;

    		$tempGlobalAction = $this->globalActions[$this->globalCounter];
    		foreach ($tempGlobalAction as $key => $value) {
    			$tempGlobalAction[$key+1] = $value;
    		}
    		$tempGlobalAction[0] = 'temp'.$this->globalCounter;
    		$this->globalActions[$this->globalCounter] = $tempGlobalAction;
    		$this->globalCounter ++;
    	}

    	ksort($result);
    	dd($this->globalActions);

    	return array_values($result);
    }
}
